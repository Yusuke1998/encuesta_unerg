<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer');
            $table->integer('radios')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('poll_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
