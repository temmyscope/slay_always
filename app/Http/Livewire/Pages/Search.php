<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;

class Search extends Component
{
    public Product $searchResult;
    public $filtered;
    public array $filters;
    protected $listeners = ['applyFilter','searchOnPage'];
    
    public function clearFilters()
    {
        $this->filters = [];
    }

    public function applyFilter()
    {
    }

    public function searchOnPage(string $query)
    {
        $this->searchResult = Product::search($query);
    }

    public function filter($filterName, $value)
    {
        //update search result object based on this filter
        if(array_key_exists($filterName, $this->filters) && $this->filters[$filterName] == $value){
            unset($this->filters[$filterName]);
            $this->emit('applyFilter');
        }else{

        }
    }

    public function mount(Request $request, $category = null)
    {
        $query = ($category !== null) ? $request->input('category') : $request->input('query');
        $this->searchResult = Product::where('name', 'like', '%'.$query.'%')
        ->orWhere('tags', 'like', '%'.$query.'%')->get();
    }

    public function render()
    {
        return view('livewire.pages.search', [
            'searchResult' => $this->searchResult
        ])->extends('layouts.app')->section('content');
    }
}
