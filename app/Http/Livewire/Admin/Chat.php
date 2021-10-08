<?php

namespace App\Http\Livewire\Admin;

use Livewire\{Component, WithFileUploads};

class Chat extends Component
{
    use WithFileUploads;

    public string $image = '';

    public function saveImage()
    {
        $this->validate([
            'photo' => 'image|max:5024', // 5MB Max
        ]);
 
        $image = $this->image->store('photos');
    }

    public function send()
    {
        
        
    }

    public function delete()
    {
        
    }

    public function render()
    {
        return view('livewire.admin.chat')->extends('layouts.admin.master');
    }
}
