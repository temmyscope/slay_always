<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryCard extends Component
{
    public $category;

    public function mount($category)
    {
        
    }

    public function render()
    {
        return view('livewire.category-card');
    }
}
