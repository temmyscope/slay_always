<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;

class NewsletterEditor extends Component
{
    public string $recipient;
    public string $title;
    public string $news;
    public string $newsType = 'email'; 
    public string $group;
    public array $newsTypesEnum = ['email'];
    public array $groups = [ 'all',  'specific', 'customers' ];

    public function send()
    {
        Newsletter::insert([
            'title' => $this->title, 'content' => $this->news, 'type' => $this->newsType,
            'recipients' => $this->group, 'admin' => Auth::id()
        ]);
        
        //send mail or push to newsletter subscribers; users are subscribed by default
    }
    
    function changeNewsType(string $type)
    {
        $this->newsType = ( in_array($type, $this->newsTypesEnum) ) ? $type : 'email' ;
    }

    public function mount($user = null)
    {
        if ( !is_null($user) && is_numeric($user)) {
            $this->recipient = $user;
        }
    }
    
    public function render()
    {
        return view('livewire.admin.newsletter-editor')
        ->extends('layouts.admin.master')->section('content');
    }

}