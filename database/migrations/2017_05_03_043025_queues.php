<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Queues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('brand_id');
            $table->integer('product_id');
            $table->string('month');
            $table->string('year');
            $table->string('pending')->default('Y');
            $table->string('send')->default('N');
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
