<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration
{

    protected $timestamps = ['start_date'];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('types')->unsigned();
            $table->string('title');
            $table->string('place');
            $table->string('thumb');
            $table->string('banner')->nullable();
            $table->decimal('original_price')->unsigned();
            $table->decimal('price')->unsigned();
            $table->integer('days')->unsigned()->default(1);
            $table->integer('member_size')->unsigned()->default(10);
            $table->longText('content');
            $table->integer('hits')->unsigned()->default(0);
            $table->integer('deals')->unsigned()->default(0);
            $table->integer('member_count')->unsigned()->default(0);
            $table->integer('istop')->unsigned()->default(0);
            $table->integer('order_number')->unsigned()->default(0);

            $table->text('description')->nullable();
            $table->string('highlights')->nullable();
            $table->string('from_place')->nullable();
            $table->string('visa')->nullable();
            $table->string('contract_phone')->nullable();

            $table->dateTime('start_date');

            $table->text('traffic')->nullable();
            $table->text('hotel')->nullable();
            $table->longText('qa')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('memos')->nullable();
            $table->string('tags')->nullable();
            $table->integer('states')->default(0);

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
        Schema::drop('activities');
    }
}
