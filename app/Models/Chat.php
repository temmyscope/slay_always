<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
