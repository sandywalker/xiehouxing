<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('note_comments', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('content');
            $table->integer('user_id')->unsigned();
            $table->integer('isbest')->unsigned()->default(0); 
            $table->integer('istop')->unsigned()->default(0); 
            $table->integer('likes')->unsigned()->default(0); 
            $table->integer('note_id')->unsigned();
            $table->foreign('note_id')->references('id')->on('notes')->onDelete('cascade');

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
        Schema::drop('note_comments');
    }
}
