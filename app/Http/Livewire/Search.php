<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public string $searchQuery;

    public function searchForQuery()
    {
        return redirect('search?query='.$this->searchQuery);
    }

    public function mount()
    {
        $this->fill([
            'searchQuery' => ''
        ]);
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
