<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Promotion;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Promotions extends Component
{
    public $promotionId;
    public $name, $coupon;
    public $discount;
    public $description; 
    public int $maxUsers; 
    public $start_date, $end_date;

    public bool $formVisibility = false;
    protected $promotions;
    protected $rules = [
        'discount' => 'required|numeric',
        'coupon' => 'required|string|unique:promotions|min:4',
        'start_date' => 'required|string',
        'end_date' => 'required|string',
    ];
    

    public function unhideForm()
    {
        $this->formVisibility = !$this->formVisibility;
    }
    
    public function cancel($id)
    {
        Promotion::where('id', $id)->update([
            'end_date' => date('Y-m-d h:i:s', strtotime('yesterday'))
        ]);
    }

    public function generateCoupon()
    {
        $this->coupon = strtoupper(Str::random(random_int(6, 16)));
    }

    public function save()
    {
        $this->validate();
        
        if ( empty($this->promotionId) ) {
            $promotion = new Promotion();
            $promotion->discount = $this->discount;
            $promotion->coupon = $this->coupon;
            $promotion->metadata = json_encode([
                'description' => $this->description, 'name' => $this->name
            ]);
            $promotion->start_date = $this->start_date;
            $promotion->end_date = $this->end_date;
            $promotion->user_id = auth()->user()->id;
            //dd($promotion);
            if($promotion->save()){
                session()->flash('message', 'Promotion & Coupon has been created.');
            }
        }else{
            Promotion::where('id', $this->promotionId)->update([
                'metadata->name' => $this->name, 'start_date' => $this->start_date,
                'metadata->description' => $this->description, 'coupon' => $this->coupon,
                'discount' => $this->discount, 'end_date' => $this->end_date,
            ]);
            session()->flash('message', 'Promotion & Coupon has been updated.');
        }
        //$this->reset([
        //    'promotionId', 'name', 'discount', 'start_date', 'end_date', 'coupon', 'description'
        //]);
    }

    public function delete($id)
    {
        Promotion::where('id', $id)->delete();
    }

    public function mount($id = null)
    {
        if ( !is_null($id) && is_numeric($id)) {
            $promotion = Promotion::find($id);
            $metadata = $promotion ? json_decode($promotion->metadata) : null;
            $this->fill([
                'promotionId' => $promotion->id, 'name' => $metadata->name,
                'discount' => $promotion->discount, 'formVisibility' => true, 
                'coupon' => $promotion?->coupon, 'description' => $metadata->description,
                'start_date' => $promotion->start_date, 'end_date' => $promotion->end_date
            ]);
        }else{
            $this->fill([
                'promotionId' => '', 'name' => '', 
                'discount' => '', 'start_date' => '', 'end_date' => '',
                'formVisibility' => false, 'coupon' => '', 'description' => '',
            ]);
        }
    }

    public function clearInputs()
    {
        $this->reset([
            'promotionId', 'name', 'discount', 'start_date', 'end_date', 'coupon', 'description'
        ]);
        $this->unhideForm();
    }

    public function render()
    {
        $this->promotions = Promotion::all();
        return view('livewire.admin.promotions', [
            'promotions' => $this->promotions
        ])->extends('layouts.admin.master')->section('content');
    }
}
