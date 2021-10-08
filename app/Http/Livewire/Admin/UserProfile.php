<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\User;

class UserProfile extends Component
{
    protected $user;

    public function update()
    {
        //admin can only update a user's role;
    }

    public function mount($id)
    {
        $this->user = User::with('profile')->find($id);
    }

    public function render()
    {
        return view('livewire.admin.user-profile', ['user' => $this->user])->extends('layouts.admin.master');
    }
}
