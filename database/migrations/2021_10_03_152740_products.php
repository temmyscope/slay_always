<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('curator')->references('id')->on('users');
            $table->string('name');
            $table->string('tags'); //comma separated labels
            $table->string('description', 225);
            $table->json('metadata'); //would contain sizes, colors etc.
            $table->float('price', 8, 2);
            $table->integer('quantity');//available quanity
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
