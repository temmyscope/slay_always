<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ContactUs;

class Contact extends Component
{
    public $feedbacks;

    public function markAsResponded($id)
    {
        ContactUs::where('id', $id)->update(['responded' => 'true']);
    }

    public function mount()
    {
        $this->fill([
            'feedbacks' => ContactUs::all(),
        ]);
    }

    public function render()
    {
        return view('livewire.admin.contact')->extends('layouts.admin.master');
    }
}
