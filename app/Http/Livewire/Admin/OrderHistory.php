<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderHistory extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function render()
    {
        return view('livewire.admin.order-history')
        ->extends('layouts.admin.master');
    }
}
