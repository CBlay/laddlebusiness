<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('home', function (Blueprint $table) {
             $table->id();
             $table->timestamps();
             $table->string('shopname');
             $table->string('about');
             $table->string('phone');
             $table->string('email');
             $table->string('address');
             $table->string('message');
             $table->string('instagram');
             $table->string('facebook');
             $table->string('twitter');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home');
    }
}
