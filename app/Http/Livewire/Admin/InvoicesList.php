<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class InvoicesList extends Component
{
    public function render()
    {
        return view('livewire.admin.invoices-list')->extends('layouts.admin.master');
    }
}
