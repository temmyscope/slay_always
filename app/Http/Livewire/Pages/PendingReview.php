<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class PendingReview extends Component
{
    public function render()
    {
        return view('livewire.pages.pending-review')
        ->extends('layouts.app')->section('content');
    }
}
