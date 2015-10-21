<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuideCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('content');
            $table->integer('user_id')->unsigned();
            $table->integer('guide_id')->unsigned();
            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');
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
        Schema::drop('guide_comments');
    }
}
