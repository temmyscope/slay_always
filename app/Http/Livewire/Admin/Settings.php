<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Settings extends Component
{
    public $vat, $shipping, $other_taxes;

    public $colors, $sizes, $categories, $socials;

    public $whatsapp, $instagram;

    protected $settings;

    public function saveTaxes()
    {
        DB::table('metadata')->insert([
            'taxes' => json_encode([
                'vat' => $this->vat, 'shipping' => $this->shipping,
                'others' => $other_taxes
            ]),
            'created_at' => '', 'updated_at' => ''
        ]);
    }

    public function saveMeta()
    {

    }

    public function saveSocials($network, $handle)
    {
        DB::table('metadata')->whereNotNull('meta->socials')
        ->update(["$network" => $handle]);
    }

    public function productsMeta()
    {
    }

    public function mount()
    {
        $this->settings = DB::table('metadata')->get();
        $taxes = $colors = $sizes = $categories = []; 
        $properties = [];
        $this->settings->each(function($item, $key) use ($properties, $taxes){
            $setting = json_decode($item->meta, true);
            $properties[$key] = $setting;

            if( array_key_exists('taxes', $setting) ){
                $taxes = $settting;
            }
        });
        
        $this->fill([
            'vat' => $taxes['vat'] ?? [], 'shipping' => $taxes['shipping'] ?? [], 
            'others' => $taxes['others'] ?? [], ...$properties
        ]);
    }

    public function render()
    {
        //eg. Tax: VAT => value, shipping => value, etc.
        
        return view('livewire.admin.settings', [
            'settings' => $this->settings
        ])->extends('layouts.admin.master')->section('content');
    }

}
