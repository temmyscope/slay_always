<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class CategoryCard extends Component
{
    public $category;

    public function mount()
    {
        $categories = Product::where('deleted', 'false')->inRandomOrder()->take(15)->get();

        $availableCategories = [];

        $categories->each(function($item) use ( &$availableCategories ) {
            $tags = array_map('trim', explode(',', $item['tags']));
            shuffle($tags);

            $availableCategories[ "$tags[0]" ] = $item->images[0]->src ?? '';

            if ($availableCategories [ "$tags[0]" ] == '') {
                unset($availableCategories [ "$tags[0]" ]);
            }
        });

        $this->fill([ 
            'category' => empty($availableCategories)? 
            [] : (collect($availableCategories)->take(5))->all()
        ]);
    }

    public function render()
    {
        return view('livewire.category-card');
    }
}
