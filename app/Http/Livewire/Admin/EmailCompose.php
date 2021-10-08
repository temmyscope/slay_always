<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EmailCompose extends Component
{

    public function delete()
    {
        
    }

    public function mount(){

    } 

    public function render()
    {
        return view('livewire.admin.email-compose')->extends('layouts.admin.master');
    }
}
