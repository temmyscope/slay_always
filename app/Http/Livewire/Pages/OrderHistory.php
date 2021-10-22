<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Order;

class OrderHistory extends Component
{
    public function render()
    {
        //list of orders; invoice link for those with status complete and checkout link for those otherwise
        return view('livewire.pages.order-history')->extends('layouts.app');
    }
}
