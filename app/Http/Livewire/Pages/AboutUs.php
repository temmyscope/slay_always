<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\ContactUs;

class AboutUs extends Component
{

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.pages.about-us')->extends('layouts.app');
    }
}
