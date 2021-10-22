<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
use App\Models\Product;

class Home extends Component
{

    public function mount()
    {
        if(!session()->has('visited')){
            session('visited', true);
            DB::table('metadata')->where('id', 1)->increment('meta->visits');
        }
    }

    public function render()
    {
        $favorites = DB::table('favorites')->select('product_id', 'count(product_id) as freq')
            ->groupBy('product_id')->orderBy('freq DESC')->take(6)->get();
        $favoriteProducts = $favorites->map( fn($item, $key) => $item->id )->all();

        $tags = DB::table('metadata')->whereNotNull('meta->categories')->first();
        $tagsArray = json_decode($tags->meta); //e.g. ['shoes', 'skirts'] etc.

        $productPerCategory = [];
        $index = 0;
        foreach ($tagsArray as $key => $tag) {
            if($index < 6){ 
                $index += 1;
                $productPerCategory[] = Product::with('image')->whereLike('tags', "%$tag%")->first();
            }
            break;
        }

        return view('livewire.pages.home', [
            'popular' => Product::whereIn(
                'id', array_values($favoriteProducts)
            )->get()->unique(),
            'categories' => $productPerCategory
        ])->extends('layouts.app')->section('content');
    }
}
