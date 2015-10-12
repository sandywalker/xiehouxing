<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBanners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->longText('description')->nullable();
            
            $table->string('tag');
            $table->string('path');
            $table->string('link')->nullable()->default('#');
            $table->string('target')->nullable();

            $table->integer('height')->unsigned()->default(0);
            $table->integer('width')->unsigned()->default(0);

            $table->integer('hits')->unsigned()->default(0);

            $table->integer('orders')->unsigned()->default(1);
            $table->integer('states')->unsigned()->default(1);

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
        Schema::drop('banners');
    }
}
