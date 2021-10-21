<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function logMeIn(Request $request)
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials, $remember=true)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }else{
            session()->flash('error', 'The provided credentials do not match our records.');
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.app')->section('content');
    }
}
