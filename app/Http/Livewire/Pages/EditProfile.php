<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;
use App\Models\{ Profile, Image, User };
use StaySlay\Traits\Reusables;

class EditProfile extends Component
{
    use Reusables;

    public $user;
    public $name, $mobile, $email, $subscribed;

    public function updateMobile()
    {
        if($this->user->profile === null){
            $profile = new Profile();
            $profile->user_id = auth()->user()->id;
            $profile->mobile = $this->mobile;
            $profile->save();
        }else{
            if ($this->user->profile->mobile !== $this->mobile) {
                $this->user->profile->mobile = $this->mobile;
                $this->user->profile->save();
            }
        }
        $this->user = User::find(auth()->user()->id);
    }

    public function updateUserProfile()
    {
        $this->user->name = $this->name;
        $this->user->subscribed = $this->subscribed === 'true'? 'true' : 'false';
        $this->user->save();
        session()->flash('message', 'Profile Updated.');
    }

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
        $this->fill([
            'mobile' => $this->user->profile?->mobile, 'email' => $this->user->email,
            'subscribed' => $this->user->subscribed, 'name' => $this->user->name
        ]);
    } 

    public function render()
    {
        return view('livewire.pages.edit-profile')
        ->extends('layouts.app')->section('content');
    }
}
