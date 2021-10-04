<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Product extends Component
{

    public function mount($id)
    {
        
    }

    public function render()
    {
        return view('livewire.admin.product')->extends('layouts.admin.master');
    }
}
