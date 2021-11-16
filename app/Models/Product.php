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

    public static function recommend($column, $range, $category)
    {
        return Product::where('deleted', 'false')->whereBetween("$column", $range)
        ->where(function($query) use($category){
            $query->whereRaw("MATCH(description) AGAINST(?)", [$category])
            ->orWhereRaw("MATCH(tags) AGAINST(?)", [$category]);
        })->inRandomOrder()->take(5)->get();
    }

    public static function search(string $search)
    {
        return Product::where('deleted', 'false')
        ->whereRaw("MATCH(description) AGAINST(?)", [$search])
        ->orWhereRaw("MATCH(tags) AGAINST(?)", [$search])
        ->orWhere("name", 'like', "%$search%")->get();
    }

    public static function perPageLimit(?string $search, ?int $limit)
    {
        $products = Product::where('deleted', 'false');
        if (!is_null($search)) {
            $products = $products->whereRaw("MATCH(description) AGAINST(?)", [ $search ])
            ->orWhereRaw("MATCH(tags) AGAINST(?)", [$search])
            ->orWhere("name", 'like', "%$search%");
        }
        return $products->paginate($limit);
    }

    public static function searchOne(string $search)
    {
        return Product::where('deleted', 'false')
        ->whereRaw("MATCH(description) AGAINST(?)", [$search])
        ->orWhereRaw("MATCH(tags) AGAINST(?)", [$search])
        ->orWhere("name", 'like', "%$search%")->first();
    }

    public static function liked($id): bool
    {
        $liked = Favorite::where('user_id', auth()->user()?->id ?? '')
        ->where('product_id', $id)->get()->all();
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
