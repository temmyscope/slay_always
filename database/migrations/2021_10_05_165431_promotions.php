<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Promotions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->float('discount');
            $table->json('metadata'); //promotion name & description
            $table->integer('max_users')->default(50);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
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
        //
    }
}
