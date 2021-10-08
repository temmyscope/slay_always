<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Promotions extends Component
{
    public function render()
    {
        return view('livewire.admin.promotions')->extends('layouts.admin.master');
    }
}
