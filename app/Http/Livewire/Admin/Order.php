<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Order as OrderModel, Image, Voucher};
use Illuminate\Support\Facades\Auth;
use App\Notifications\{ DeliveryCompleted, UserNotification };

class Order extends Component
{
    public $order;
    public $products;
    public $images;

    public $checkedItemsId = [];
    
    public function mount($id)
    {
        $this->order = OrderModel::find($id);
        $this->products = json_decode($this->order->metadata, true)['products'];
    }

    public function cancelOrder($id, $ref)
    {
        $order = OrderModel::find($id);
        $user = $order->user;
        $note = new \StdClass();
        $note->name = explode(' ', $user->name);
        $note->note = "We are sorry to inform you that your order was canceled.".
        "Your refund has already been processed and should arrive within the next 72hrs.<br/> Thanks.";
        $user->notify(new UserNotification($note));

        OrderModel::where('id', $id)->update(['status' => 'canceled']);
        createRefund($ref);
    }

    public function markOrderAsDelivered($id)
    {
        $order = OrderModel::find($id);
        $user = $order->user;
        $order->delivery_status = 'completed';
        $user->notify(new DeliveryCompleted($order) );
        $order->save();
    }

    public function removeItem($product)
    {

        $this->order->total -= $this->products[$product]['activePrice'];
        
        $voucherPrice = $this->products[$product]['activePrice'];
        unset(
            $this->products[$product]
        );
    
        
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
        $note->name = explode(' ', $user->name)[0];
        $note->note = "An item in your order is currently unavailable and have been removed from your order. <br/>".
        "We've converted the value for you to StaySlay Voucher; You can use it on your next purchase.";
        $user->notify(new UserNotification($note));
        session()->flash('message', 'Item has been removed from order and user has been informed.');
    }


    public function render()
    {
        return view('livewire.admin.order')->extends('layouts.admin.master');
    }

}