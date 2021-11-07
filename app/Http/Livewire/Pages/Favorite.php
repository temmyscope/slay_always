<?php
namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\{ Product, Favorite as FavoriteModel };
use StaySlay\Traits\Reusables;

class Favorite extends Component
{
    protected $favorites;

    use Reusables;

    public function clear()
    {
        FavoriteModel::where('user_id', auth()->user()->id)->delete();
        $this->emitTo('search', 'refreshFavoriteCount');
    }

    public function mount()
    {
        $favorites = FavoriteModel::where(
            'user_id', auth()->user()->id
        )->get();
        $this->favorites = $favorites;
    }

    public function render()
    {
        return view('livewire.pages.favorite', [
            'favorites' => $this->favorites
        ])->extends('layouts.app')->section('content');
    }

}