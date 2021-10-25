<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
use App\Models\{ Product, Favorite };

class Home extends Component
{

    public function mount()
    {
        $visited = session('visited');
        $visitedAt = date('Y-m-d');
        if(!$visited || $visited !== $visitedAt){
            session('visited', $visitedAt);
            DB::table('metadata')->where('id', 1)->increment('meta->visits');
        }
    }

    public function render()
    {
        $favorites = ((Favorite::selectRaw('count(id) AS frequency, product_id')
        ->groupBy('product_id')->take(10)->get())?->sortByDesc('frequency'))->values()->all();
        
        $favoriteProducts = !empty($favorites) ? $favorites->map( fn($item, $key) => $item->id )->all() : [];
        
        $tags = DB::table('metadata')->whereNotNull('meta->categories')->first();
        
        $productPerCategory = [];
        if (!empty($tags)) {
            //e.g. "shoes, skirts, lingerie" etc. into [shoes, skirts, lingerie]
            $tagsArray = explode(',', trim(json_decode($tags->meta)->categories, ","));
            $index = 0;
            foreach ($tagsArray as $key => $tag) {
                if($index < 6){ 
                    $index += 1;
                    $tag = trim($tag);
                    $productPerCategory[] = Product::with('image')->whereLike('tags', "%$tag%")->first();
                }
                break;
            }
        }

        return view('livewire.pages.home', [
            'popular' => Product::whereIn(
                'id', array_values($favoriteProducts)
            )->get()->unique(),
            'categories' => $productPerCategory
        ])->extends('layouts.app')->section('content');
    }

}
