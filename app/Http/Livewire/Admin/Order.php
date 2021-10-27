<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Order as OrderModel, Image};
use Illuminate\Support\Facades\Auth;

class Order extends Component
{
    public OrderModel $order;
    public $products;
    public $images;

    public $checkedItemsId = [];
    
    public function mount($id)
    {
        $this->order = OrderModel::with('user:name')->find($id);
        $this->products = json_decode($this->order->metadata, true)['products'];
    }

    public function cancelOrder($id, $ref)
    {
        OrderModel::where('id', $id)
        ->update(['status' => 'canceled']);
        createRefund($ref);
    }

    public function removeItem($product)
    {
        $this->checkedItemsId[] = $product;
    }

    public function removeCheckedItems()
    {
        foreach($this->checkedItemsId as $productId){
            $this->order->total = $this->order->total - $this->products[$productId]->activePrice;
            unset($this->products[$productId]);
        }
        OrderModel::where('id', $this->order->id)->update([
            'total' => $this->order->total,
            'metadata->products' => json_encode($this->products),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.order', [
            'order' => $this->order
        ])->extends('layouts.admin.master');
    }

}