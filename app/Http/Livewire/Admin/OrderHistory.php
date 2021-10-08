<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class OrderHistory extends Component
{
    public function render()
    {
        return view('livewire.admin.order-history')->extends('layouts.admin.master');
    }
}
