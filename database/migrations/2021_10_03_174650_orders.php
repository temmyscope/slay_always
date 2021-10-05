<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id');
            $table->char('txn_id', 16);
            $table->json('metadata')->nullable(); //any other info that does not fit in elsewhere
            $table->string('coupon_id')->nullable();
            $table->foreignId('total'); //sub_total from cart - coupons/promos deductions + taxes (VAT)
            $table->enum('status', ['pending', 'completed']); //a payment would only be entered here if it is complete
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
