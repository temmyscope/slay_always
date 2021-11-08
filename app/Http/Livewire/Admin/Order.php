<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Order as OrderModel, Image, Voucher};
use Illuminate\Support\Facades\Auth;
use App\Notifications\{ DeliveryCompleted, UserNotification };

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
        $order = OrderModel::find($id);
        $user = $order->user;
        $note = new \StdClass();
        $note->name = explode(' ', $user->name);
        $note->note = "We are sorry, Your order was canceled.".
        "Your refund has already been processed and should arrive within the next 72hrs.<br/> Thanks.";
        $user->notify(new UserNotification($note));

        OrderModel::where('id', $id)->update(['status' => 'canceled']);
        createRefund($ref);
    }

    public function markOrderHasDelivered($id)
    {
        $order = OrderModel::find($id);
        $user = $order->user;
        $user->notify( new DeliveryCompleted($order) );
    }

    public function removeItem($product)
    {
        $this->checkedItemsId[] = $product;
    }

    public function removeCheckedItems()
    {
        $voucherPrice = 0;
        foreach($this->checkedItemsId as $productId){
            $this->order->total -= $this->products[$productId]->activePrice;
            $voucherPrice += $this->products[$productId]->activePrice;
            unset($this->products[$productId]);
        }
        OrderModel::where('id', $this->order->id)->update([
            'total' => $this->order->total,
            'metadata->products' => json_encode($this->products),
        ]);
        $voucher = new Voucher();
        $voucher->user_id = $this->order->user_id;
        $voucher->value = $voucherPrice;
        $voucher->save();

        $user = $this->order->user;
        $note = new \StdClass();
        $note->name = explode(' ', $user->name);
        $note->note = "Some items in your order are currently unavailable and have been removed. <br/>".
        "We've converted the value for you to StaySlay Voucher; You can use it on your next purchase.";
        $user->notify(new UserNotification($note));
    }

    public function render()
    {
        return view('livewire.admin.order', [
            'order' => $this->order
        ])->extends('layouts.admin.master');
    }

}