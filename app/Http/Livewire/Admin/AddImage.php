<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Image;
use StaySlay\Traits\Reusables;

class AddImage extends Component
{
    protected $imageableId;
    protected $imageableType;

    use Reusables;

    public function mount($id, $type)
    {
        $this->fill([
            'imageableId' => $id,
            'imageableType' => $type
        ]);
    }

    public function save()
    {
        $images = $this->uploadMany();
        $img = New Image();
        foreach($images as $image){
            $img->imageabletype = $this->imageableType;
            $img->imageableid = $this->imageableId;
            $img->src = $image;
            $img->save();
        }
    }

    public function render()
    {
        return view('livewire.admin.add-image');
    }
}
