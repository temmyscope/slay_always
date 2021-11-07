<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\User;

class Users extends Component
{
    public function updateRole($user, $role)
    {
        //admin can only update a user's role;
        User::where('id', $user)->update(['role' => $role]);
    }

    public function render()
    {
        return view('livewire.admin.users', [
            'users' => User::with('profile')->get()
        ])->extends('layouts.admin.master');
    }
}
