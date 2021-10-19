<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Recent extends Component
{
    public function render()
    {
        return view('livewire.pages.recent')->extends('layouts.app');
    }
}
