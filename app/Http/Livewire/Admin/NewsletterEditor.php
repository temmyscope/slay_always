<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class NewsletterEditor extends Component
{
    
    public function render()
    {
        return view('livewire.admin.newsletter-editor')->extends('layouts.admin.master');
    }
}
