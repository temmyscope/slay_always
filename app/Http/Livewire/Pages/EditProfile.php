<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\{ Profile, Image };
use StaySlay\Traits\Reusables;

class EditProfile extends Component
{
    use Reusables;

    public $phone;

    public function update()
    {

    }

    public function render()
    {
        return view('livewire.pages.edit-profile')
        ->extends('layouts.app')->section('content');
    }
}
