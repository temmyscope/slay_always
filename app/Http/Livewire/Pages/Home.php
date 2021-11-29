<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };
use App\Models\{ Product, Favorite, Category };

class Home extends Component
{

    public function mount()
    {
    }
    
    public function newVisitorToday()
    {
        DB::table('metadata')->where('id', 1)->increment('meta->visits');
    }

    public function render()
    {
        $favorites = ((Favorite::selectRaw('count(id) AS frequency, product_id')
        ->groupBy('product_id')->take(10)->get())?->sortByDesc('frequency'))->values()->all();
        
        $favoriteProducts = !empty($favorites) ? array_map( fn($item) => $item->id, $favorites) : [];
        
        return view('livewire.pages.home', [
            'popular' => Product::where('deleted', 'false')->whereIn(
                'id', array_values($favoriteProducts)
            )->get()->unique(),
            'random' => Product::where('deleted', 'false')->inRandomOrder()->take(5)->get(),
            'categories' => (New Category())->categories(),
            'youtube' => json_decode(
                DB::table('metadata')->where('id', 3)->first()?->meta, true
            )['youtube'] ?? '',
            'announcements' => DB::table('notes')->where('is_modal', 'true')
            ->where('active_at', '>', date('Y-m-d h:i:s'))->take(4)->get()
        ])->extends('layouts.app')->section('content');
    }

}
