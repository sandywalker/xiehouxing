<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('types')->unsigned();
            $table->string('area');
            $table->longText('description')->nullable();
            $table->longText('content');
            $table->string('thumb');
            $table->string('banner_thumb')->nullable();
            $table->string('tags')->nullable();
            $table->integer('hits')->unsigned()->default(0);    
            $table->integer('likes')->unsigned()->default(0);    
            $table->integer('favs')->unsigned()->default(0);    
            $table->integer('points')->unsigned()->default(5);    
            $table->integer('cmts')->unsigned()->default(0);    
            $table->integer('isbest')->unsigned()->default(0);  
            $table->integer('orders')->unsigned()->default(1);  
            $table->integer('creator')->unsigned()->nullable();

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
        Schema::drop('guides');
    }
}
