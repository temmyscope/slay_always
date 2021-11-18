<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\{ Order, Profile, User };
use Illuminate\Http\Request;
use App\Notifications\OrderCompleted;

class OrderHistory extends Component
{
    public $orders;

    public function verifyTxn(string $ref)
    {
        $response = (array) paystackVerifyPayment($ref);
        if ( 
            isset($response['data']['status']) 
            && strtolower($response['data']['status']) === 'success' 
        ){
            $user_id = auth()->user()->id;
            $order = Order::where('txn_id', $ref)
            ->where('user_id',  $user_id)->first();

            if ($order) {
                $user = User::find( $user_id );
                if ($user) {
                    $user->notify(new OrderCompleted($order));
                }
                Order::where('id', $order->id)->update([
                    'status' => 'completed', 'metadata->paymentData' => json_encode($response)
                ]);
                if (strtolower($response['data']['channel']) === 'card') {
                    Profile::where('user_id', $user_id)->update([
                        'paystack_token' => $response['authorization']['authorization_code']
                    ]);
                }
            }
        }
    }

    public function mount(Request $request)
    {
        if ($request->has('reference')) {
            $this->verifyTxn( $request->input('reference') );
        }

        $orders = Order::where('user_id', auth()->user()->id )->get();
        $this->fill([
            'orders' => $orders
        ]);
    }
    public function render()
    {
        return view('livewire.pages.order-history', [
            
        ])->extends('layouts.app');
    }
}
