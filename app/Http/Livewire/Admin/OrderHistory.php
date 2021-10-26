<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderHistory extends Component
{
    protected $orders;

    public function cancelOrder()
    {
        OrderModel::where('id', $id)->update(['status' => 'canceled']);
        //and refund
    }

    public function mount()
    {
        $this->orders = Order::with('user:name')->get();
    }

    public function render()
    {
        return view('livewire.admin.order-history', [
            'orders' => $this->orders
        ])->extends('layouts.admin.master');
    }
}
