<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AddProduct extends Component
{
    public $name;
    public $description;
 
    protected $rules = [
        'name' => 'required|min:6',
        'description' => 'required',
    ];

    public function create()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.admin.add-product');
    }
}
