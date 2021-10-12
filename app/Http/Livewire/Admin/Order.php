<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order as OrderModel;
use Illuminate\Support\Facades\Auth;

class Order extends Component
{
    public OrderModel $order;
    
    public function mount($id)
    {
        $this->order = OrderModel::find($id);
    }

    public function render()
    {
        return view('livewire.admin.order', [
            'order' => $this->order
        ])->extends('layouts.admin.master');
    }

}