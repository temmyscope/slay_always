<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class Promotions extends Component
{
    public int $promotionId; 
    public string $name;
    public float $discount;
    public string $description; 
    public int $maxUsers; 
    public string $dateRange;

    public bool $formVisibility = false;
    protected $promotions;
    protected $rules = [
        'code' => 'required|min:6',
        'discount' => 'required|num',
    ];
    

    public function unhideForm()
    {
        $this->formVisibility = true;
    }
    
    public function cancel($id)
    {
        Promotion::where('id', $id)->update([
            'end_date' => date('Y-m-d h:i:s')
        ]);
    }

    public function save()
    {
        $dateRange = explode(' - ', $this->dateRange); //i.e. explode 9/3/2012 - 9/3/201
        Promotion::updateOrInsert([
            'metadata->name' => $this->name, 
            'metadata->description' => $this->description, 
            'discount' => $this->discount,
            'max_users' => $this->maxUsers,
            'start_date' => $dateRange[0] ?? null,
            'end_date' => $dateRange[1] ?? null,
            'coupon' => ''
        ], ['id' => $this->promotionId]);
    }

    public function delete($id)
    {
        Promotion::where('id', $id)->delete();
    }
    public function mount($id = null)
    {
        $this->promotions = Promotion::all();
        if ( !is_null($id) && is_numeric($id)) {
            $promotion = Promotion::find($id);
            $this->fill([
                'promotionId' => $promotion->id, 'name' => $promotion->metadata->name,
                'discount' => $promotion->discount, 'description' => $promotion->metadata->description,
                'maxUsers' => $promotion->max_users, 'formVisibility' => true,
                'dateRange' => $promotion->start_date." - ".$promotion->end_date
            ]);
        }
    }
    public function render()
    {
        return view('livewire.admin.promotions', [
            'promotions' => $this->promotions
        ])->extends('layouts.admin.master');
    }
}
