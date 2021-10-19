<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Settings extends Component
{
    protected $settings;

    public function saveConfig(string $key, mixed $value)
    {
        
    }

    public function render()
    {
        $this->settings = DB::table('metadata')->get();
        return view('livewire.admin.settings', [
            'settings' => $this->settings
        ])->extends('layouts.admin.master');
    }

}
