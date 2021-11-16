<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\{ DB };

use App\Models\Instagram as InstagramModel;

class Instagram extends Component
{

    public function render()
    {
        $socials = DB::table('metadata')->whereNotNull('meta->socials')->first();
        $gramFeed = fetchGramFeed(
            json_decode($socials->meta)->socials->instagram
        );
        return view('livewire.instagram', [ 
            'instagram' => $gramFeed, 
            'instagramPosts' => InstagramModel::where(
                'deleted', 'false'
            )->orderBy('updated_at', 'desc')->get()
        ]);
    }

}