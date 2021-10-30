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

    protected $rules = [
        'vat' => 'required'
    ];

    public function saveTaxes()
    {
        DB::table('metadata')->where('id', 2)->update([
            'meta' =>  json_encode([
                'taxes' => [ 
                    'vat' => (float)$this->vat, 'shipping' => (float)$this->shipping,
                    'others' => (float)$this->other_taxes
                ]
            ]), 'updated_at' => date('Y-m-d h:i:s')
        ]);
    }

    public function saveMeta($meta)
    {
        DB::table('metadata')->whereNotNull("meta->$meta")->update(
          ["meta->$meta" => $this->$meta, 'updated_at' => date('Y-m-d h:i:s') ]
        );
    }

    public function saveSocials()
    {
        DB::table('metadata')->where('id', 3)->update([
            'meta' =>  json_encode([
                'socials' => [ 'instagram' => $this->instagram, 'whatsapp' => $this->whatsapp ]
            ]), 'updated_at' => date('Y-m-d h:i:s')
        ]);
    }

    public function productsMeta()
    {
    }

    public function mount()
    {
        $this->settings = DB::table('metadata')->get();
        $taxes = []; 
        $properties = [];
        $socials = [];
        $this->settings->each(function($item, $key) use (&$properties, &$taxes, &$socials){
            $setting = json_decode($item->meta, true);
            if( array_key_exists('taxes', $setting) ){
                $taxes = $setting['taxes'];
            }elseif( array_key_exists('socials', $setting) ){
                $socials = $setting['socials'];
            }else{
                $v = array_values($setting);
                $k = array_keys($setting);
                $properties[ $k[0] ] = $v[0];
            }
        });
        //dd([$taxes, $properties, $socials]);

        unset($properties['visits']);
        $this->fill([
            'vat' => $taxes['vat'] ?? null, 'shipping' => $taxes['shipping'] ?? null, 
            'others' => $taxes['others'] ?? null, 'colors' => $properties['colors'] ?? "", 
            'sizes' => $properties['sizes'] ?? "", 'categories' => $properties['categories'] ?? "", 
            'whatsapp' => $socials['whatsapp'] ?? null, 'instagram' => $socials['instagram'] ?? null
        ]);
    }

    public function render()
    {
        return view('livewire.admin.settings', [
            'settings' => $this->settings
        ])->extends('layouts.admin.master')->section('content');
    }

}
