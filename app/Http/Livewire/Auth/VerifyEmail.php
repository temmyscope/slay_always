<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Http\Request;

class VerifyEmail extends Component
{
    public function resendVerificationLink(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        session()->flash('message', 'Verification link sent! Please check your mail.');
    }

    public function render()
    {
        return view('livewire.auth.verify-email')->extends('layouts.app')->section('content');
    }

}
