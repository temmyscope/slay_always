<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class EditAddress extends Component
{
    public function render()
    {
        return view('livewire.pages.edit-address')
        ->extends('layouts.app')->section('content');
    }
}
