<?php

namespace App\Http\Livewire\Admin;

use Livewire\{Component, WithFileUploads};
use App\Models\Chat as ChatModel;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    use WithFileUploads;

    public $recipient;
    public string $image, $msg = '';
    protected $chatsHistory, $chatInFocus;

    public function saveImage()
    {
        $this->validate([
            'photo' => 'image|max:5024', // 5MB Max
        ]);
 
        $image = $this->image->store('photos');
    }

    public function send()
    {
        ChatModel::insert([
            'sender' => Auth::id(), 'recipient' => $this->recipient,
            'msg' => $this->msg
        ]);
    }

    public function delete()
    {
    }

    public function mount($id = null)
    {
        $this->recipient = $id;
        $this->chatsHistory = ChatModel::with('profile')->take(5);
        $this->chatInFocus = ChatModel::with('profile')
        ->where('sender', $id)->orWhere('recipient', $id)->get();
    }

    public function render()
    {
        return view('livewire.admin.chat', [
            'chatsHistory' => $this->chatsHistory,
            'chatInFocus' => $this->chatInFocus
        ])->extends('layouts.admin.master');
    }
}
