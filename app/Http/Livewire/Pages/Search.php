<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Product;

class Search extends Component
{
    public $searchResult;
    public bool $filtered;
    public $category;
    public $isCategory;
    public $filterResult, $gender, $color, $size, $price;
    protected $listeners = [
        'applyColorsFilter','searchOnPage','applySizesFilter',
        'applyCategoryFilter','applyGenderFilter','applyPriceFilter'
    ];
    
    public function clearFilters()
    {
        $this->gender = ''; $this->color = '';
        $this->size = ''; $this->price = '';
    }

    public function searchOnPage(string $query)
    {
        $this->searchResult = Product::search($query);
    }

    public function filterCount()
    {
        if (!$this->filtered) {
            return 0;
        }
        return 1;
    }

    public function mount(Request $request, $category = null)
    {
        $query = '';
        if($category !== null){
            $query = $category;
        }else{
            if ( $request->input('category') ) {
                $query = $request->input('category');
            }else{
                $query = $request->input('query');
            }
        }
        $this->fill([
            'category' => $query, 'filteredResult' => [], 'filtered' => false,
            'isCategory' => $category !== null, 'searchResult' => Product::search($query)
        ]);
    }

    public function updated($name, $value)
    {
        $this->filter = match($name){
            'price' => $this->applyPriceFilter($value),
            'category' => $this->applyCategoryFilter($value),
            'gender' => $this->applyGenderFilter($value), 
            'size', 'color' => $this->applyOtherFilter($value),
            default => null
        };
    }

    public function render()
    {
        return view('livewire.pages.search')
        ->extends('layouts.app')->section('content');
    }

    public function applyOtherFilter($filter)
    {
        if (is_null($this->searchResult)) return;

        if (!empty($filter)) {
            $this->filterResult = $this->searchResult->filter(function ($value, $key) use($filter) {
                return str_contains($value->metadata, $filter);
            })->all();
            $this->filtered = true;
        }
    }

    public function applyCategoryFilter($filter)
    {
        if (is_null($this->searchResult)) return;
        
        if (!empty($filter)) {
            $this->filterResult = $this->searchResult->filter(function ($value, $key) use($filter) {
                return str_contains($value->tags, $filter);
            })->all();
            $this->filtered = true;
        }
    }

    public function applyGenderFilter($filter)
    {
        if (is_null($this->searchResult)) return;
        
        if (!empty($filter)) {
            $this->filterResult = $this->searchResult->filter(function ($value, $key) use($filter) {
                $gender = json_decode($value->metadata, true);
                return array_key_exists('gendered', $gender) && $gender['gendered'] === true;
            })->all();
            $this->filtered = true;
        }
    }

    public function applyPriceFilter($filter)
    {
        if (is_null($this->searchResult)) return;

        if (!empty($filter)) {
            //process string value of e.g. 1000:10000 into [1000.00, 10000.00]
            $filter = array_map(
                'floatval', explode(':', $filter)
            );
            [$min, $max] = $filter; $this->filtered = true;
            $this->filterResult = $this->searchResult->filter(function ($value, $key) 
            use($min, $max) {
                return ($min < $value->price && $max > $value->price);
            })->all();
        }
    }

}
