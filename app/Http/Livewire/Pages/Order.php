<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Order extends Component
{
    public function render()
    {
        return view('livewire.pages.order')->extends('layouts.app');
    }
}
