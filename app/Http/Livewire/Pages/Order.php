<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\Order as OrderModel;

class Order extends Component
{
    public $order, $products, $metadata;


    public function mount($id)
    {
        $order = OrderModel::find($id);

        $metadata = json_decode($order->metadata, true);

        $this->fill([
            'order' => $order, 'products' => $metadata['products'],
            'metadata' => $metadata
        ]);
    }

    public function render()
    {
        return view('livewire.pages.order')
        ->extends('layouts.app')->section('content');
    }
}
