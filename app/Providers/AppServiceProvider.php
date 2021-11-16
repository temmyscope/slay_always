<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'profile' => 'App\Models\Profile', 'order' => 'App\Models\Order',
            'product' => 'App\Models\Product', 'user' => 'App\Models\User',
            'favorite' => 'App\Models\Favorite', 'image' => 'App\Models\Image',
            'instagram' => 'App\Models\Instagram'
        ]);
    }
}
