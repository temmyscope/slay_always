<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\PageScript;
use Illuminate\Support\Str;

class Scripts extends Component
{
    public $script, $scripts, $snippet, $position;

    public function saveCode($id)
    {
        if ($id = null) {
            $code = New PageScript();
            $code->script_id = Str::random(43).Str::uuid();
            $code->code = $this->snippet;
            $code->position = $this->position;
            $code->save();
        }else{
            PageScript::where('id', $id)->update([
                'code' => $this->snippet,
                'position' => $this->position
            ]);
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
            'script' => $id, 'snippet' => PageScript::find($id)?->code
        ]);
    }

    public function render()
    {
        return view('livewire.admin.scripts')
        ->extends('layouts.admin.master')->section('content');
    }
}
