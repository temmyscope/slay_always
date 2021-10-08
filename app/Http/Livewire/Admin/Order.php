<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Order extends Component
{

    public function cancel()
    {
        
    }
    
    public function mount($id)
    {
        
    }

    public function render()
    {
        return view('livewire.admin.order')->extends('layouts.admin.master');
    }

}
