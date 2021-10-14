<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    public function currentlyRunning(): bool | self
    {
        //only one promotion can be running at a time
        $running = Promotion::where(['end_date', '>', date('Y-m-d')])->first();
        if (empty($running)) {
            return false;
        }
        return $running;
    }
}
