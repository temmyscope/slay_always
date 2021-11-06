<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;

class Search extends Component
{
    public $searchResult;
    public $filtered;
    public $category;
    public $isCategory;
    public array $filters;
    protected $listeners = [
        'applyColorsFilter','searchOnPage','applySizesFilter',
        'applyCategoryFilter','applyGenderFilter','applyPriceFilter'
    ];
    
    public function clearFilters()
    {
        $this->filters = [];
    }

    public function searchOnPage(string $query)
    {
        $this->searchResult = Product::search($query);
    }

    //update search result object based on this filter
    public function filter($filterName, $value)
    {
        if(array_key_exists($filterName, $this->filters) && $this->filters[$filterName] == $value){
            unset($this->filters[$filterName]);
        }else{
        }
        $this->emitSelf("apply{$filterName}Filter");
    }

    public function mount(Request $request, $category = null)
    {
        $query = ($category !== null) ? $request->input('category') : $request->input('query');
        $this->fill([
            'category' => $category ?? ucfirst($query ?? 'All'), 'filters' => [], 'filtered' => [], 
            'isCategory' => $category !== null, 'searchResult' => Product::search($query)
        ]);
    }

    public function render()
    {
        return view('livewire.pages.search')
        ->extends('layouts.app')->section('content');
    }

    public function applyColorsFilter()
    {
        $this->filtered = $this->searchResult->filter()->all();
    }

    public function applySizesFilter()
    {
    }

    public function applyCategoryFilter()
    {
    }

    public function applyGenderFilter()
    {
    }

    public function applyPriceFilter()
    {
    }

}
