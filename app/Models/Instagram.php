<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{ DB };

class Instagram extends Model
{
  use HasFactory;

  public function image()
  {
    return $this->morphOne(Image::class, 'imageable');
  }

  public function latestPosts()
  {
      return $this->hasOne(Instagram::class)->latestOfMany();
  }

}