<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.admin.home')->extends('layouts.admin.master');
    }
}
