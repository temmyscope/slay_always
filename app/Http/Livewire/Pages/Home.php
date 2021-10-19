<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };

class Home extends Component
{

    public function mount()
    {
        if(!session()->has('visited')){
            session('visited', true);
            DB::table('metadata')->where('id', 1)->increment('meta->visits');
        }
    }

    public function render()
    {
        return view('livewire.pages.home')->extends('layouts.app');
    }
}
