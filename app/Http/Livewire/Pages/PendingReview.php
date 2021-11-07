<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Order;

class PendingReview extends Component
{
    public $orders;

    public function mount()
    {
        $orders = Order::where('user_id', auth()->user()->id)
        ->where('delivery_status', 'completed')->get();
        
        $this->fill([
            'orders' => $orders
        ]);
    }

    public function render()
    {
        return view('livewire.pages.pending-review')
        ->extends('layouts.app')->section('content');
    }

}
