<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class BlogEditor extends Component
{
    public function render()
    {
        return view('livewire.admin.blog-editor')->extends('layouts.admin.master');
    }
}
