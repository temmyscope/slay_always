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
        
        $favoriteProducts = !empty($favorites) ? array_map( fn($item) => $item->id, $favorites) : [];
        $socials = DB::table('metadata')->whereNotNull('meta->socials')->first();
        $gramFeed = fetchGramFeed(
            json_decode($socials->meta)->socials->instagram
        );
        //dd($gramFeed);
        
        return view('livewire.pages.home', [
            'popular' => Product::where('deleted', 'false')->whereIn(
                'id', array_values($favoriteProducts)
            )->get()->unique(),
            'random' => Product::where('deleted', 'false')->inRandomOrder()->take(5)->get(),
            'categories' => (New Category())->categories(),
            'instagram' => $gramFeed->graphql->user
        ])->extends('layouts.app')->section('content');
    }

}
