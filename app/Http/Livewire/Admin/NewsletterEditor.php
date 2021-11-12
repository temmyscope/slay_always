<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\{ Newsletter as NewsletterModel, User, Visitor };
use App\Notifications\{ NewsLetter, UserNotification };
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NewsletterEditor extends Component
{
    public $recipient, $name, $email, $title, $news, $newsType, $group;
    public $pastNewsLetters, $newsLetterIndex;
    public array $newsTypesEnum = ['email'];
    protected $rule = [
        'group' => 'required|in:all,specific',
        'news' => 'required|string',
        'newsType' => 'required|string|in:email,push'
    ];  

    //send mail or push
    public function send()
    {
        $userDoesNotExists = !empty($this->email) && !User::where('email', $this->email)->exists();
        $note = new \Stdclass();
        $note->subject = $this->title;
        $note->msg = $this->news;

        if ( $userDoesNotExists ) {
            $note->user = $this->name;
            $visitor = new Visitor($this->email, $this->name);
            Notification::send($visitor, new UserNotification($note));
        } else {
            $users = match(true){
                !empty($this->email) => User::where('email', $this->email)->first(),
                !empty($this->recipient) => User::find('id', $this->recipient),
                default => User::where('subscribed', 'true')->get()
            };

            if (empty($users)) {
                return session()->flash('message', 'No user with this email on the database');
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
                $note->user = $users->name;
                Notification::send($users, new UserNotification($note));
            } else {
                Notification::send($users, new Newsletter($news));
            }
        }
        $this->reset(['title', 'news']);
        session()->flash('message', 'Your mail has been sent');
    }

    public function useMail($id)
    {
        $newletter = NewsletterModel::find($id);
        if (!empty($newsletter)) {
            $this->fill([
                'title' => $newsletter->title, 'news' => $newsletter->content
            ]);
        }
    }

    public function next()
    {
        $this->newsLetterIndex = (isset($this->pastNewsLetters[$this->newsLetterIndex+4])) ?
        $this->newsLetterIndex + 4 : $this->newsLetterIndex;
    }

    public function previous()
    {
        $this->newsLetterIndex = (isset($this->pastNewsLetters[$this->newsLetterIndex-4])) ?
        $this->newsLetterIndex - 4 : $this->newsLetterIndex;
    }

    public function mount(Request $request, $user = null)
    {
        $user = (is_null($user)) ? $user : User::find($user);
        $name = (!is_null($user) ? $user->name : 
            $request->has('name')) ? $request->input('name') : '';
        $email = (!is_null($user) ? $user->email : 
            $request->has('email')) ? $request->input('email') : '';
        $this->fill([
            'recipient' => $user, 'newsType' => 'email',
            'group' => $user ? 'specific' : '', 'news' => '',
            'name' => $name, 'email' => $email, 'title' => '',
            'pastNewsLetters' => NewsletterModel::all(), 'newsLetterIndex' => 0,
        ]);
    }
    
    public function render()
    {
        return view('livewire.admin.newsletter-editor')
        ->extends('layouts.admin.master')->section('content');
    }

}