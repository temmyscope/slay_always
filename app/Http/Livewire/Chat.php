<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{ Chat as ChatModel, Image };
use StaySlay\Traits\Reusables;

class Chat extends Component
{

    public $recipient;
    public string $msg = '';
    protected $chatInFocus;

    use Reusables;

    protected function saveChat($msg=null): int | null
    {
        return ChatModel::insertGetId([
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
        ->orderBy('created_at')->get();
    }

    public function render()
    {
        return view('livewire.chat');
    }
}
