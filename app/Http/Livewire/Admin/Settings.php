<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Settings extends Component
{
    public $vat, $shipping, $other_taxes;

    public $colors, $sizes, $categories;

    protected $settings;

    public function saveTaxes()
    {
    }

    public function productsMeta()
    {
    }

    public function render()
    {
        //eg. Tax: VAT => value, shipping => value, etc.
        $this->settings = DB::table('metadata')->get();
        return view('livewire.admin.settings', [
            'settings' => $this->settings
        ])->extends('layouts.admin.master')->section('content');
    }

}
