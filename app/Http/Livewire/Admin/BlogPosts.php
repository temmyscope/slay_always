<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class BlogPosts extends Component
{
    public function render()
    {
        return view('livewire.admin.blog-posts')->extends('layouts.admin.master');
    }
}
