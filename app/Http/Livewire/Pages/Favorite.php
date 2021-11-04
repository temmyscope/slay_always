<?php
namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\{ Product, Favorite as FavoriteModel };
use StaySlay\Traits\Reusables;

class Favorite extends Component
{
    protected array $favorites = [];

    use Reusables;

    public function clear()
    {
        session()->remove('user-favorites');
    }

    public function mount()
    {
    }

    public function render()
    {
        $favorites = FavoriteModel::select('product_id')->where(
            'user_id', auth()->user()->id
        )->get();
        $favoriteList = [];
        $favorites->each( fn($item, $key) => array_push($favoriteList, $item->product_id));
        return view('livewire.pages.favorite', [
            'products' => Product::whereIn('id', $favoriteList)->with('image')->get()
        ])->extends('layouts.app')->section('content');
    }

}