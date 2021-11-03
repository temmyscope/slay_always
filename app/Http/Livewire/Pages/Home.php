<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
use App\Models\{ Product, Favorite, Category };

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
        $socials = DB::table('metadata')->whereNotNull('meta->socials')->first();
        $gramFeed = fetchGramFeed(
            json_decode($socials->meta)->socials->instagram
        );
        //dd($gramFeed);
        
        return view('livewire.pages.home', [
            'popular' => Product::whereIn(
                'id', array_values($favoriteProducts)
            )->get()->unique(),
            'categories' => (New Category())->categories(),
            'instagram' => $gramFeed->graphql->user
        ])->extends('layouts.app')->section('content');
    }

}
