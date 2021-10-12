<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class Promotions extends Component
{
    public bool $formVisibility = false;
    protected ?array $promotions = [];
    protected array | Promotion $promotionById = [];

    public function unhideForm()
    {
        $this->formVisibility = true;
    }
    public function updateState($field, $value)
    {
        if (is_array($this->promotionById)) {
            $this->promotionById[$field] = $value;
        }else{
            $this->promotionById->$field = $value;
        }
    }
    public function cancel($id)
    {
        Promotion::update([
            'end_date' => date('Y-m-d h:i:s')
        ], ['id' => $id]);
    }
    public function update()
    {
        if($this->promotionById instanceof Promotion)
            $this->promotionById->save();
    }
    public function delete($id)
    {
        Promotion::delete($id);
    }
    public function create()
    {
        $promotion = New Promotion();
        foreach ($this->promotionById as $key => $value) {
            if ($key === 'name' ||$key === 'description') {
                $promotion->metadata[$key] = $value;
            } else {
                $promotion->$key = $value;
            }
        }
        $promotion->save();
    }
    public function mount($id = null)
    {
        $this->promotions = Promotion::all();
        if (is_numeric($id)) {
            $this->promotionById = Promotion::find($id);
        }
    }
    public function render()
    {
        return view('livewire.admin.promotions', [
            'promotions' => $this->promotions, 
            'promotion' => $this->promotionById
        ])->extends('layouts.admin.master');
    }
}
