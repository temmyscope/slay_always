<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{ DB };

class Product extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public static function search(string $search)
    {
        return Product::whereRaw("MATCH(tags, description) AGAINST(?)", [
            $search 
        ])->orWhereLike("name", "%$search%")->get();
    }

    public static function searchOne(string $search)
    {
        return Product::whereRaw("MATCH(tags, description) AGAINST(?)", [
            $search 
        ])->orWhereLike("name", "%$search%")->first();
    }

}
