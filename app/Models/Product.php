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
        return Product::whereRaw("MATCH(description) AGAINST(?)", [$search])
        ->orWhereRaw("MATCH(tags) AGAINST(?)", [$search])
        ->orWhere("name", 'like', "%$search%")
        ->get();
    }

    public static function searchOne(string $search)
    {
        return Product::whereRaw("MATCH(description) AGAINST(?)", [$search])
        ->orWhereRaw("MATCH(tags) AGAINST(?)", [$search])
        ->orWhere("name", 'like', "%$search%")->first();
    }

    public function liked(): bool
    {
        $liked = Favorite::where('user_id', auth()->user()->id)
        ->where('product_id', $this->id)->get()->all();
        if (empty($liked)) {
            return false;
        }
        return true;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }

}
