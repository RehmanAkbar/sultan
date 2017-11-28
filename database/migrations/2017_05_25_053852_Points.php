<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Points extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('points', function (Blueprint $table) {
           $table->increments('id');
           $table->string('user_id')->nullable();
           $table->string('points')->nullable();
           $table->string('points_used')->nullable();
           $table->string('points_un_used')->nullable();
           $table->string('is_active')->default('1');
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
