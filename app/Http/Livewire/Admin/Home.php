<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\{ Auth, DB };
use App\Models\{ Order, User, Product, Favorite, Cart };

class Home extends Component
{

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.admin.home', [
            'orders' => Order::where('status','completed')->count(), 
            'balance' => Order::where('status','completed')->sum('total'),
            'products' => Product::count(),
            'pageVisitors'=> DB::table('metadata')->select('meta')->first(), 
            'orderList' => Order::where('status', 'completed')->latest()->take(6), 
            'mostLiked' => Favorite::select('product_id, count(id) as likes')
            ->with('product:name,image')->groupBy('product_id')->orderBy('likes')->take(3),
            'users' => User::count(), 'carts' => Cart::count()
        ])->extends('layouts.admin.master');
    }
}
