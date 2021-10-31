<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{ DB };

class Category extends Model
{
    use HasFactory;

    public function categories()
    {
        $tags = DB::table('metadata')->whereNotNull('meta->categories')->first();
        $categories = explode(',', json_decode($tags->meta)->categories, true);
        $categories = array_unique($categories);
        $catData = [];
        foreach ($categories as $cat) {
            $product= Product::with('image')->where('tags', 'like', "%$cat%")->first();
            if ( empty($product) ) {
                continue;
            }
            $catData[$cat] = $product;
        }
        return array_unique($catData);
    }
}
