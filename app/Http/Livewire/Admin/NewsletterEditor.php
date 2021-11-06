<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Newsletter as NewsletterModel, User};
use App\Notifications\NewsLetter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NewsletterEditor extends Component
{
    public string $recipient;
    public string $email;
    public string $title;
    public string $news;
    public string $newsType; 
    public string $group;
    public array $newsTypesEnum = ['email'];
    public array $groups = [ 'all',  'specific',];

    //send mail or push to newsletter subscribers; users are subscribed by default
    public function send()
    {
        $users = User::where('subscribed', 'true')->get();

        if ($recipient) {
            $users = User::where('id', $recipient)->get();
        }
        if ($email) {
            $users = User::where('email', $email)->get();
        }

        $news = New NewsletterModel();
        $news->title = $this->title;
        $news->content = $this->news;
        $news->type = $this->newsType;
        $news->recipients = $this->group;//all subscribed users
        $news->admin = Auth::id();
        $news->reach = $users->count();
        $news->save();

        Notification::send($users, new Newsletter($news));
        redirect();
    }

    public function mount($user = null)
    {
        $this->fill([
            'recipient' => $user, 'newsType' => 'email'
        ]);
    }
    
    public function render()
    {
        return view('livewire.admin.newsletter-editor')
        ->extends('layouts.admin.master')->section('content');
    }

}