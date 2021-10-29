<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;

class Search extends Component
{
    public Product $searchResult;
    public array $filters;
    
    public function clearFilters()
    {
        $this->filters = [];
    }

    public function Filter($filterName, $value)
    {
        //update search result object based on this filter
    }

    public function mount(Request $request)
    {
        $query = $request->input('query') ?? $request->input('category');
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
