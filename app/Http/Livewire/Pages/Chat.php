<?php

namespace App\Http\Livewire\Pages;

use Livewire\{Component, WithFileUploads};
use App\Models\{ Chat as ChatModel, Image };
use App\Http\Livewire\Traits\Reusables;

class Chat extends Component
{

    public $recipient;
    public string $msg = '';
    protected $chatsHistory, $chatInFocus;

    use Reusables;

    protected function saveChat($msg=null): int | null
    {
        return ChatModel::getInsertId([
            'msg' => ($msg === null)? $this->msg : $msg,
            'sender' => Auth::id(), 
            'recipient' => $this->recipient,
        ]);
    }

    public function saveImage()
    {
        $this->saveChat(msg: "[!image: ".$this->upload()." !]");
    }

    public function send()
    {
        $this->saveChat();
    }

    public function mount($id = null)
    {
        $this->recipient = $id;
        $this->chatInFocus = ChatModel::with('user:name')
        ->where('recipient', auth()->user()->id )
        ->orWhere('sender', auth()->user()->id)
        ->orderBy('created_at ASC')->get();
    }

    public function render()
    {
        return view('livewire.pages.chat')
        ->extends('layouts.app')->section('content');
    }
}
