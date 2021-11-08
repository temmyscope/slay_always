<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\{ Hash, Password };

class ResetPassword extends Component
{
    public $email, $password, $password_confirmation, $token;

    protected $rules = [
        'email' => 'required|email',
        'token' => 'require|string',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password'
    ];

    public function resetPass(Request $request)
    {
        $this->validate();

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password) 
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET ? 
        redirect()->route('login')->with('status', __($status)) : session()->flash('email', __($status) );
    }

    public function mount(Request $request, $token)
    {
        $this->fill([
            'token' => $token
        ]);
    }

    public function render()
    {
        return view('livewire.auth.reset-password')->extends('layouts.app')->section('content');
    }
}
