<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\{ Product, Favorite as FavoriteModel, Cart };

class Favorite extends Component
{
    protected array $cart = [];

    public function addToCart($id, $price, $qty=1)
    {
        $this->cart[$id] = $qty;
        $userId = auth()->user()->id;
        if (empty($this->cart)) {
            Cart::insert([
                'user_id' => $userId, 'sub_total' => $price*$qty,
                'items' => json_encode($this->cart),
            ]);
            //items will be stored as $product_id => $quantity e.g. cart[125 => 2]
        }else{
            $price = 0;
            Cart::where('user_id', $userId)->where('ordered', 'false')
            ->increment('sub_total', $price*$qty, [ 'items' => json_encode($this->cart) ]);
        }
    }

    public function delete($id)
    {
        FavoriteModel::where('product_id', $id)
        ->where('user_id', auth()->user()->id)->delete();
    }

    public function mount()
    {
    }

    public function render()
    {
        $userId = auth()->user()->id;
        $cart = Cart::where('user_id', $userId)->where('ordered', 'false')->first();
        if (!empty($cart)) {
            $this->cart = json_decode($cart->items);
        }
        $favorites = FavoriteModel::select('product_id')->where('user_id', )
        ->get();
        $favoriteList = [];
        $favorites->each( fn($item, $key) => array_push($favoriteList, $item->product_id));
        return view('livewire.pages.favorite', [
            'products' => Product::whereIn('id', $favoriteList)->with('image')->get()
        ]);
    }
}
