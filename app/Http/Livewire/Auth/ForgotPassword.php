<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPassword extends Component
{
    public $email;

    protected $rules = [ 'email' => 'required|email' ];

    public function sendLink(Request $request)
    {
        $this->validate();

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT ? 
        session()->flash('status', __($status)) : session()->flash('error', __($status));
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->extends('layouts.app')->section('content');
    }

}
