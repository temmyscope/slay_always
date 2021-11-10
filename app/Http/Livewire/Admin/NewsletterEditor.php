<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{Newsletter as NewsletterModel, User};
use App\Notifications\{ NewsLetter, UserNotification };
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NewsletterEditor extends Component
{
    public $recipient, $email, $title, $news, $newsType, $group;
    public array $newsTypesEnum = ['email'];
    public array $groups = [ 'all',  'specific',];

    //send mail or push to newsletter subscribers; users are subscribed by default
    public function send()
    {
        $users = match(true){
            //!empty($this->email) => User::where('email', $this->email)->first(),
            !empty($this->recipient) => User::find('id', $this->recipient),
            default => User::where('subscribed', 'true')->get()
        };

        if (empty($users)) {
            session()->flash('message', 'No user with this email on the database');
        }

        $news = New NewsletterModel();
        $news->title = $this->title;
        $news->content = $this->news;
        $news->type = $this->newsType;
        $news->recipients = json_encode([
            'users' => $users->id ?? $users
        ]);
        $news->admin = Auth::id();
        $news->save();

        if ( $users->email ) {
            $note = new \Stdclass();
            $note->note = $this->news;
            $note->user = $users->name;
            Notification::send($users, new UserNotification($note));
        } else {
            Notification::send($users, new Newsletter($news));
        }
        session()->flash('message', 'Your Newsletter has been sent');
    }

    public function mount($user = null)
    {
        $this->fill([
            'recipient' => $user, 'newsType' => 'email',
            'email' => User::find($user)?->email, 'title' => '', 
            'group' => $user ? 'specific' : '', 'news' => '',
        ]);
    }
    
    public function render()
    {
        return view('livewire.admin.newsletter-editor')
        ->extends('layouts.admin.master')->section('content');
    }

}