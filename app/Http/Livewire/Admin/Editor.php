<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Editor extends Component
{
    public function mount()
    {
        
    }
    
    public function render()
    {
        return view('livewire.admin.editor')->extends('layouts.admin.master');
    }
}
