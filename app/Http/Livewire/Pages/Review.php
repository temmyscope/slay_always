<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\{ Product, Review as ReviewModel };

class Review extends Component
{
    public $product;
    public $fitting, $sizePurchased, $stars, $comment;
    public $availableFittings = ['True to size', 'Runs small', 'Too large'];

    public function mount($id)
    {
        $this->product = Product::find($id);
        $this->fill([
            'stars' => 0, 'comment' => '', 
            'sizePurchased' => '', 'fitting' => 'True to size'
        ]); 
        if ( 
            ReviewModel::where('product_id', $this->product->id)
            ->where('user_id', auth()->user()->id)->exists() 
        ) {
            return redirect()->route("user-product", [ 'id' => $id ]);
        }
    }

    public function submitReview()
    {
        $this->validate([
            'stars' => 'required', 'sizePurchased' => 'required|string'
        ]);
        $this->product->reviews()->save(
            new ReviewModel([
                'fitting' => $this->fitting, 'rating' => $this->stars,
                'size' => $this->sizePurchased, 'review' =>  $this->comment,
                'user_id' => auth()->user()->id
            ])
        );
        return redirect()->route("user-product", [ 'id' => $this->product->id ]);
    }

    public function render()
    {
        return view('livewire.pages.review')
        ->extends('layouts.app')->section('content');
    }
}
