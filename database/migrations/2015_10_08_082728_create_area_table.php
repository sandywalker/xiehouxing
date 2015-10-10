<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pid')->unsigned()->nullable();
            $table->string('paths');
            $table->integer('levels')->unsigned();
            $table->integer('sort')->unsigned()->default(0);
            $table->string('names');
            $table->string('names_en');
            $table->timestamps();

            $table->foreign('pid')->references('id')->on('area')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('areas');
    }
}
