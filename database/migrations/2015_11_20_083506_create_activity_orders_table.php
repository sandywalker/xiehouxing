<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('pay_code')->nullable();
            $table->integer('activity_id');
            $table->integer('user_id');
            $table->string('from_place')->nullable();
            $table->string('contact_name');
            $table->string('phone_number');
            $table->string('contact_email')->nullable();
            $table->string('memo')->nullable();
            $table->integer('discount')->unsigned()->default(100);
            $table->integer('cash_back')->unsigned()->default(0);
            $table->integer('pay_approach')->unsigned()->default(0);
            $table->string('pay_type')->nullable();
            $table->integer('member_count')->unsigned()->default(1);
            $table->integer('amount')->unsigned();
            $table->integer('states')->unsigned();
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
        Schema::drop('activity_orders');
    }
}
