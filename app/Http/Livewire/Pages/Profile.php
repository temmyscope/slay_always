<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use StaySlay\Traits\Reusables;

class Profile extends Component
{
    
    use Reusables;

    public function save()
    {

    }

    public function render()
    {
        return view('livewire.pages.profile', [])->extends('layouts.app');
    }
}
