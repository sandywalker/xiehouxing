<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('activity_members', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('activity_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('phone_number');
            $table->integer('sex')->unsigned()->default(0);
            $table->integer('boys')->unsigned()->default(0);
            $table->integer('girls')->unsigned()->default(0);
            $table->integer('count')->unsigned()->default(0);
            $table->string('companion')->nullable();
            $table->string('memo')->nullable();

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
       Schema::drop('activity_members');
    }
}
