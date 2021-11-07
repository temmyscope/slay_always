<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Review extends Component
{
    public function render()
    {
        return view('livewire.pages.review')
        ->extends('layouts.app')->section('content');
    }
}
