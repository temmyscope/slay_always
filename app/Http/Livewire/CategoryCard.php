<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryCard extends Component
{
    public $category;
    public $name;

    public function mount($category, $name)
    {
        $this->fill([
            'category' => $category, 'name' => $name
        ]);
    }

    public function render()
    {
        return view('livewire.category-card');
    }
}
