<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class NewsletterList extends Component
{

    public function mount()
    {
        
    }

    public function render()
    {
        return view('livewire.admin.newsletter-list')->extends('layouts.admin.master');
    }
}
