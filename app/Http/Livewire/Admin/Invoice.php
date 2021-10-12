<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class Invoice extends Component
{
    public function mount($id)
    {
        $this->order = OrderModel::find($id);
    }
    
    public function render()
    {
        return view('livewire.admin.invoice', [
            'order' => $this->order
        ])->extends('layouts.admin.master');
    }
}
