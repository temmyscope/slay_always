<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ContactUs;

class Contact extends Component
{
    protected $feedbacks;

    public function mount()
    {
        $this->feedbacks = ContactUs::all();
    }
    
    public function render()
    {
        return view('livewire.admin.contact', [
            'feedbacks' => $this->feedbacks
        ])->extends('layouts.admin.master');
    }
}
