<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Invoice extends Component
{
    public function render()
    {
        return view('livewire.admin.invoice')->extends('layouts.admin.master');
    }
}
