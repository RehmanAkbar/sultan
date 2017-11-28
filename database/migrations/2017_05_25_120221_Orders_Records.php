<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrdersRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('orders_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('month');
            $table->string('payment');
            $table->string('status');
            $table->rememberToken();
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
