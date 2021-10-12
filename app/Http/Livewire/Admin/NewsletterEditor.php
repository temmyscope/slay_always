<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Auth;

class NewsletterEditor extends Component
{
    public string $title;
    public string $news;
    public string $newsType; 
    public string $group;
    public array $newsTypes = ['email', 'push'];
    public array $groups = [ 'all', 'specific', 'customers', 'verified' ];

    public function send()
    {
        Newsletter::insert([
            'title' => $this->title, 'content' => $this->news, 'type' => $this->newsType,
            'recipients' => json_encode(['group' => $this->group]), 'admin' => Auth::id()
        ]);
    }
    
    public function render()
    {
        return view('livewire.admin.newsletter-editor')->extends('layouts.admin.master');
    }

}