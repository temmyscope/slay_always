<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\{ Instagram, Image };
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use StaySlay\Traits\Reusables;

class AddInstagram extends Component
{
    use Reusables;

    public $imageableId;
    public $imageableType;

    public $instagramId;
    public $link;

    public bool $formVisibility;
    protected $rules = [
        'link' => 'required|string',
    ];
    

    public function unhideForm()
    {
        $this->formVisibility = !$this->formVisibility;
    }

    public function save()
    {
        $this->validate();

        if ( empty($this->instagramId) ) {
            $instagram = new Instagram();
            $instagram->link = $this->link;
            $instagram->deleted = 'false';

            if($instagram->save()){
                $img = New Image();
                $img->user_id = auth()->user()->id;
                $img->imageable_id = $instagram->id;
                $img->imageable_type = 'instagram';
                $img->src = $this->upload();
                $img->save();
                session()->flash('message', 'Instagram Image and Link has been added.');
            }
        }else{
            Promotion::where('id', $this->instagramId)
            ->update([ 'link' => $this->instagram ]);
            session()->flash('message', 'Promotion & Coupon has been updated.');
        }

        $this->reset([ 'image', 'link' ]);
    }

    public function delete($id)
    {
        Promotion::where('id', $id)->delete();
    }

    public function mount($id = null)
    {
        if ( !is_null($id) && is_numeric($id)) {
            $instagram = Instagram::find($id);
            $this->fill([
                'instagramId' => $instagram->id, 
                'link' => $instagram->link,
                'formVisibility' => true, 
            ]);
        }else{
            $this->fill([
                'instagramId' => '',
                'link' => '', 'formVisibility' => false, 
            ]);
        }
    }

    public function clearInputs()
    {
        $this->reset([ 'instagramId', 'link', ]);
        $this->unhideForm();
    }

    public function render()
    {
        return view('livewire.admin.add-instagram', [
            'instagramPosts' => Instagram::where('deleted', 'false')->get()
        ])->extends('layouts.admin.master')->section('content');
    }
}
