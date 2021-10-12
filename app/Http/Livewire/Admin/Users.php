<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\User;

class Users extends Component
{
    protected array $users = [];

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.admin.users', ['users' => $this->users])->extends('layouts.admin.master');
    }
}
