<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\{ Hash, Password };

class ChangePassword extends Component
{
    public $oldPassword;

    public $newPassword, $confirmPassword;

    protected $rules = [
        'oldPassword' => 'required|min:8',
        'newPassword' => 'required|min:8',
        'confirmPassword' => 'required|same:newPassword'
    ];

    public function changePass()
    {
        $this->validate();

        $user = User::find(auth()->user()->id);

        $user->forceFill([
            'password' => Hash::make($this->newPassword) 
        ])->setRememberToken(Str::random(60));
        if($user->save()) session()->flash('message', 'Your Password was updated');
            //H9R8BSDP8czSM3d
    }

    public function mount()
    {
        $this->fill([
            'oldPassword' => '', 'newPassword' => '', 'confirmPassword' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.pages.change-password')
        ->extends('layouts.app')->section('content');
    }
}
