<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;

class Coupons extends Component
{
    public $id, $code;

    public bool $formVisibility = false;
    protected ?array $coupons = [];
    protected array | Coupon $couponById = [];

    public function unhideForm()
    {
        $this->formVisibility = true;
    }
    public function updateState($field, $value)
    {
        if (is_array($this->couponById)) {
            $this->couponById[$field] = $value;
        }else{
            $this->couponById->$field = $value;
        }
    }
    public function deactivate($id)
    {
        Coupon::update([
            'end_date' => date('Y-m-d h:i:s')
        ], ['id' => $id]);
    }
    public function update()
    {
        if($this->couponById instanceof Coupon)
            $this->couponById->save();
    }
    public function delete($id)
    {
        Coupon::delete($id);
    }
    public function create()
    {
        $coupon = New Coupon();
        foreach ($this->couponById as $key => $value) {
            if ($key === 'name' ||$key === 'description') {
                $coupon->metadata[$key] = $value;
            } else {
                $coupon->$key = $value;
            }
        }
        $promotion->save();
    }
    public function mount($id = null)
    {
        $this->coupons = Coupon::all();
        if (is_numeric($id)) {
            $this->couponById = Coupon::find($id);
        }
    }

    public function render()
    {
        return view('livewire.admin.coupons', [
            'coupons' => $this->coupons, 
            'coupon' => $this->couponById
        ])->extends('layouts.admin.master');
    }
}
