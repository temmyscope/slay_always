<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };

class Announcement extends Component
{
    public string $note, $expiry;
    public bool $visibility;
    public $isAnnouncement;

    public function mount()
    {
        $this->fill([ 
            'visibility' => false,
            'isAnnouncement' => '',
            'note' => '', 'expiry' => '',
        ]);
    }

    public function unhideForm()
    {
        $this->visibility = !$this->visibility;
    }
    
    public function delete($id)
    {
        DB::table('notes')->where('id', $id)->update([
            'active_at' => date("Y-m-d h:i:s", strtotime('yesterday'))
        ]);
    }

    public function save()
    {
        $this->validate([
            'note' => 'required|string|max:250',
            'expiry' => 'required'
        ]);
        DB::table('notes')->insert([
            'note' => $this->note, 'created_at' => date('Y-m-d h:i:s'),
            'is_modal' => empty($this->isAnnouncement)? 'false': 'true',
            'active_at' => date('Y-m-d h:i:s', strtotime($this->expiry))
        ]);
        session()->flash('message', 'Your announcement has been published.');
        $this->fill(['note' => '', 'expiry' => '']);
    }
    
    public function render()
    {
        return view('livewire.admin.announcement', [
            'notes' => DB::table('notes')->where(
                'active_at', '>', date('Y-m-d h:i:s', strtotime('today'))
            )->get()
        ])->extends('layouts.admin.master')->section('content');
    }
}
