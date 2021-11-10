<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\PageScript;
use Illuminate\Support\Str;

class Scripts extends Component
{
    public $script, $scripts, $snippet, $position;
    public $visibility = false;

    public function switchVisibility()
    {
        $this->visibility = !$this->visibility;
    }

    public function saveCode()
    {
        $this->validate([
            'script' => 'required|string',
            'position' => 'required|string|in:head,foot,body'
        ]);
        if ($this->script = null) {
            $code = New PageScript();
            $code->script_id = Str::random(4).((Str::uuid())->toString());
            $code->code = $this->snippet;
            $code->position = $this->position;
            $code->save();
            session()->flash('message', 'Your srcipt has been created.');
        }else{
            PageScript::where('id', $this->script)->update([
                'code' => $this->snippet, 'position' => $this->position
            ]);
            session()->flash('message', 'Your update has been made.');
        }
    }

    public function delete($id)
    {
        PageScript::where('id', $id)->update(['deleted' => 'true']);
    }

    public function mount($id = null)
    {
        $this->fill([
            'scripts' => PageScript::where('deleted', 'false')->get()->all(),
            'script' => $id, 'snippet' => PageScript::find($id)?->code ?? ''
        ]);
    }

    public function render()
    {
        return view('livewire.admin.scripts')
        ->extends('layouts.admin.master')->section('content');
    }
}
