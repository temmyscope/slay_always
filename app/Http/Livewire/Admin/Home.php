<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\{ Auth, DB };
use App\Models\{ Order, User, Product, Favorite };

class Home extends Component
{

    public function mount()
    {
    }

    public function render()
    {
        /*
        dd(
            Favorite::select('product_id', DB::Raw('count(product_id) as likes'))
            ->groupBy('product_id')->orderBy('likes', 'desc')->take(9)->get()
        );
        */
        return view('livewire.admin.home', [
            'orders' => Order::where('status','completed')->count(), 
            'balance' => Order::where('status','completed')->sum('total'),
            'products' => Product::count(),
            'pageVisitors'=> DB::table('metadata')->select('meta')->first(), 
            'orderList' => Order::where('status', 'completed')->latest()->take(6), 
            'mostLiked' => Favorite::select('product_id', DB::Raw('count(product_id) as likes'))
            ->groupBy('product_id')->orderBy('likes', 'desc')->take(9)->get(),
            'users' => User::count(),
        ])->extends('layouts.admin.master');
    }
}
