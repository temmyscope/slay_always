<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };

class Announcement extends Component
{

    public string $note, $expiry;

    public function mount()
    {
        $this->fill([ 'note' => '', 'expiry' => '' ]);
    }

    public function save()
    {
        $this->validate([
            'note' => 'required|string|max:250',
            'expiry' => 'required'
        ]);
        DB::table('notes')->insert([
            'note' => $this->note,
            'created_at' => date('Y-m-d h:is'),
            'active_at' => date('Y-m-d h:i:s', strtotime("$this->expiry"))
        ]);
        $this->fill(['note' => '']);
        session()->flash('message', 'Your announcement has been published.');
    }
    public function render()
    {
        return view('livewire.admin.announcement')
        ->extends('layouts.admin.master')->section('content');
    }
}
