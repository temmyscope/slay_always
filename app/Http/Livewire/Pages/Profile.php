<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\User;
use StaySlay\Traits\Reusables;

class Profile extends Component
{
    
    use Reusables;

    public $avatar;
    public $userData;

    public function save()
    {
    }

    public function mount()
    {
        $user = User::find( auth()->user()->id );
        $avatar = array_map(
            fn($name) => strtoupper($name[0]), 
            $name = array_map('trim', explode(' ', $user->name))
        );

        $this->fill([
            'avatar' => $avatar[0].$avatar[1], 
            'userData' => $user,
        ]);
    }

    public function render()
    {
        return view('livewire.pages.profile', [
            'user' => $this->userData
        ])->extends('layouts.app')->section('content');
    }
}
