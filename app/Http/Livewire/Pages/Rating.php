<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Rating extends Component
{
    public function render()
    {
        return view('livewire.pages.rating')->extends('layouts.app');
    }
}
