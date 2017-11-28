<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('brand_id');
            $table->integer('product_id');
            $table->integer('price_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('address');
            $table->string('zip_code');
            $table->string('apt_suit')->nullable();
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
