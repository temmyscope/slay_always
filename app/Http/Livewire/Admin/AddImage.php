<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Image;
use StaySlay\Traits\Reusables;

class AddImage extends Component
{
    public $imageableId;
    public $imageableType;

    use Reusables;

    public function save()
    {
        $images = $this->uploadMany();
        $img = New Image();
        foreach($images as $image){
            $img->user_id = auth()->user()->id;
            $img->imageable_id = $this->imageableId;
            $img->imageable_type = $this->imageableType;
            $img->src = $image;
            $img->save();
        }
        
        $href = route('list-products');
        session()->flash(
            'message', 
            "Image(s) have been uploaded. <a href='{$href}'>Go Back</a>"
        );
    }

    public function mount($id, $type)
    {
        $this->fill([
            'imageableId' => (int) $id,
            'imageableType' => $type
        ]);
    }

    public function render()
    {
        return view('livewire.admin.add-image')
        ->extends('layouts.admin.master')->section('content');
    }
}
