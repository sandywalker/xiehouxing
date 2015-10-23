<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('place');
            $table->longText('description')->nullable();
            $table->longText('content');
            $table->string('thumb');
            $table->string('tags')->nullable();
            $table->integer('hits')->unsigned()->default(0);    
            $table->integer('likes')->unsigned()->default(0);    
            $table->integer('favs')->unsigned()->default(0);    
            $table->integer('points')->unsigned()->default(5);    
            $table->integer('cmts')->unsigned()->default(0);    
            $table->integer('isbest')->unsigned()->default(0);  
            $table->integer('istop')->unsigned()->default(0);  
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
        Schema::drop('notes');
    }
}
