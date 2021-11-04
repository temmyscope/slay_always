<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Order;

class OrderHistory extends Component
{
    public $orders;

    public function mount()
    {
        $orders = Order::where('user_id', auth()->user()->id )->get();
        $this->fill([
            'orders' => $orders
        ]);
    }
    public function render()
    {
        //list of orders; invoice link for those with status complete and checkout link for those otherwise
        return view('livewire.pages.order-history', [
            
        ])->extends('layouts.app');
    }
}
