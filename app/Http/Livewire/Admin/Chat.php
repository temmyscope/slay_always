<?php

namespace App\Http\Livewire\Admin;

use Livewire\{Component};
use App\Models\Chat as ChatModel;
use Illuminate\Support\Facades\Auth;
use StaySlay\Traits\Reusables;

class Chat extends Component
{
    public $user;
    public $recipient;
    public string $msg = '';
    public $chatsHistory, $chatInFocus;

    use Reusables;

    protected function saveChat($msg=null)
    {
        $chat = New ChatModel;
        $chat->msg = ($msg === null) ? $this->msg : $msg;
        $chat->user_id = $this->user->id;
        $chat->recipient_id = $this->recipient->id;
        $chat->save();
    }

    public function saveImage()
    {
        $image = $this->upload();
        $id = $this->saveChat(msg: "[!image!]:$image");
    }

    public function send()
    {
        $this->saveChat();
        $this->emit('updateChat');
    }

    public function updateChat()
    {
        $this->chatInFocus = ChatModel::where([
                [ 'user_id', $this->user->id ],  
                [ 'recipient_id', $this->user->id ]
            ])->orWhere([
                [ 'user_id', $this->user->id ], 
                [ 'recipient_id', $this->user->id ]
            ])->orderBy('created_at')->get();
        $this->msg = "";
    }

    public function mount($id = null)
    {
        $this->user = auth()->user();
        $this->chatsHistory = ChatModel::where(
            'recipient_id', $this->user->id
        )->distinct()->latest()->take(10)->get();

        $this->recipient = $id ? \App\Models\User::find($id) : $this->user;
        
        if ( !$this->chatsHistory->empty() ) {
            $this->chatInFocus = ChatModel::where([
                [ 'user_id', $id ],  [ 'recipient_id', $this->user->id ]
            ])->orWhere([
                [ 'user_id', $this->user->id ], [ 'recipient_id', $this->user->id ]
            ])->orderBy('created_at')->get();
        }
        
    }

    public function render()
    {
        return view('livewire.admin.chat', [
            //'chatsHistory' => $this->chatsHistory,
            //'chatInFocus' => $this->chatInFocus
        ])->extends('layouts.admin.master')->section('content');
    }
}
