<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public static function currentlyRunning($coupon=''): bool | self
    {
        $running = [];
        if ($coupon && $coupon !== '') {
            $running = Promotion::where('coupon', $coupon)
            ->where(['end_date', '>', date('Y-m-d')])->first();
        } else {
            $running = Promotion::where('end_date', '>', date('Y-m-d'))->first();
        }
        if (empty($running)) {
            return false;
        }
        return $running;
    }
}
