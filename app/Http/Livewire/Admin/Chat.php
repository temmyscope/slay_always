<?php

namespace App\Http\Livewire\Admin;

use Livewire\{Component};
use App\Models\Chat as ChatModel;
use Illuminate\Support\Facades\Auth;
use StaySlay\Traits\Reusables;

class Chat extends Component
{
    public $userId;
    public $recipient;
    public string $msg = '';
    protected $chatsHistory, $chatInFocus;

    use Reusables;

    protected function saveChat($msg=null): int | null
    {
        return ChatModel::getInsertId([
            'msg' => ($msg === null) ? $this->msg : $msg,
            'sender' => Auth::id(), 
            'recipient' => $this->recipient,
        ]);
    }

    public function saveImage()
    {
        $image = $this->upload();
        $id = $this->saveChat(msg: "[!image!]:$image");
    }

    public function send()
    {
        $this->saveChat();
    }

    public function mount($id = null)
    {
        $this->userId = auth()->user()->id;
        $this->chatsHistory = ChatModel::with('user:id,name')->latest()->take(10)->get();
        $this->recipient = (!is_null($id)) ? $id : ($this->chatsHistory[0]->user->id ?? 0);
        if ( !$this->chatsHistory->empty() ) {
            $this->chatInFocus = ChatModel::with('user:name')
            ->where([
                [ 'sender', $id ],  [ 'recipient', auth()->user()->id ]
            ])->orWhere([
                [ 'sender', auth()->user()->id ], [ 'recipient', $id ]
            ])->orderBy('created_at')->get();
            
        }
        
    }

    public function render()
    {
        return view('livewire.admin.chat', [
            'chatsHistory' => $this->chatsHistory,
            'chatInFocus' => $this->chatInFocus
        ])->extends('layouts.admin.master')->section('content');
    }
}
