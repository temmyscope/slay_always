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
        $this->validate(['photo' => 'image|max:5096']); //5MB Max
        $image = $this->image->store('photos');
        $id = $this->saveChat(msg: "[!image: $image !]");
    }

    public function send()
    {
        $this->saveChat();
    }

    public function mount($id = null)
    {   
        $this->chatsHistory = ChatModel::with('user:id,name')->latest()->take(10)->get();
        $this->recipient = (!is_null($id)) ? $id : ($this->chatsHistory[0]->user->id ?? 0);

        if ( !empty($this->chatsHistory) ) {
            $this->chatInFocus = ChatModel::with('user:name')
            ->where([
                [ 'sender', $id ],  [ 'recipient', auth()->user()->id ]
            ])->orWhere([
                [ 'sender', auth()->user()->id ], [ 'recipient', $id ]
            ])->orderBy('created_at ASC')->get();
            
        }
        
    }

    public function render()
    {
        return view('livewire.admin.chat', [
            'chatsHistory' => $this->chatsHistory,
            'chatInFocus' => $this->chatInFocus
        ])->extends('layouts.admin.master');
    }
}
