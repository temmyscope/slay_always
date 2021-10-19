<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;

class Search extends Component
{
    protected $searchResult;

    public function mount(Request $request)
    {
        $query = $request->input('query');
        $this->searchResult = Product::where('name', 'like', '%'.$query.'%')
        ->orWhere('tags', 'like', '%'.$query.'%')->get();
    }

    public function render()
    {
        return view('livewire.pages.search', [
            'searchResult' => $this->searchResult
        ])->extends('layouts.app');
    }
}
