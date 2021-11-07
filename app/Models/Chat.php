<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function sender()
    {
        return $this->hasOneThrough(User::class, Chat::class, 'recipient_id', 'id');
    }

    public function recipient()
    {
        return $this->hasOneThrough(User::class, Chat::class, 'user_id', 'id');
    }

}
