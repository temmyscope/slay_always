<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class Register extends Component
{
    public $firstname, $lastname, $email, $password, $confirm_pass;

    protected $rules = [
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'confirm_pass' => 'required|same:password'
    ];

    public function save()
    {
        $this->validate();

        $user = New User;
        $user->name = $this->firstname.' '.$this->lastname;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->acl = 'customer';
        if ($user->save()) {
            session()->flash('message', 'Your account has been created successfully.');
        }
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.app')->section('content');
    }
}
