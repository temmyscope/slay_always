<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderHistory extends Component
{
    protected $orders;

    public function cancel($id)
    {
        OrderModel::where('id', $id)->update([
            'status' => 'canceled'
        ]);
    }

    public function mount()
    {
        $this->orders = Order::all();
    }

    public function render()
    {
        return view('livewire.admin.order-history', [
            'orders' => $this->orders
        ])->extends('layouts.admin.master');
    }
}
