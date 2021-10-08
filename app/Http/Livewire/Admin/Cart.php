<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Cart extends Component
{

    public function mount($user)
    {
        
    }

    public function render()
    {
        return view('livewire.admin.cart')->extends('layouts.admin.master');
    }
}
