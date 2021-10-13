<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class Coupons extends Component
{
    public $couponId, $code, $discount;

    public bool $formVisibility = false;
    protected ?array $coupons = [];
    protected $rules = [
        'code' => 'required|min:6',
        'discount' => 'required|num',
    ];

    public function mount($id = null)
    {
        $this->coupons = Coupon::all();
        if (is_numeric($id)) {
            $coupon = Coupon::find($id);
            $this->couponId = $coupon->id;
            $this->code = $coupon->code;
            $this->discount = $coupon->discount;
            $this->formVisibility = true;
        }
    }

    public function unhideForm()
    {
        $this->formVisibility = true;
    }

    public function deactivate($id)
    {
        Coupon::where('id', $id)->update([
            'deleted' => 'true'
        ]);
    }

    public function save()
    {
        Coupon::updateOrInsert([
            'code' => $this->code, 'discount' => $this->discount,
        ], ['id' => $this->couponId]);
    }

    public function delete($id)
    {
        Coupon::delete($id);
    }

    public function create()
    {
        $coupon = New Coupon();
        foreach ($this->couponById as $key => $value) {
            if ($key === 'code' ||$key === 'description') {
                $coupon->metadata[$key] = $value;
            } else {
                $coupon->$key = $value;
            }
        }
        $promotion->save();
    }
    public function render()
    {
        return view('livewire.admin.coupons', [
            'coupons' => $this->coupons, 
            'coupon' => $this->couponById
        ])->extends('layouts.admin.master');
    }
}
