<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrderHistory extends Component
{
    protected $orders;

    public function cancel($id)
    {
        OrderModel::where('id', $id)->update(['status' => 'canceled']);
    }

    public function refund()
    {
    }

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.admin.order-history', [
            'orders' => Order::with('user:name')->get()
        ])->extends('layouts.admin.master');
    }
}
