<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('types')->unsigned();
            $table->string('title');
            $table->string('place');
            $table->string('thumb');
            $table->decimal('original_price')->unsigned();
            $table->decimal('price')->unsigned();
            $table->integer('days')->unsigned()->default(1);
            $table->integer('member_size')->unsigned()->default(10);
            $table->longText('content');
            $table->integer('hits')->unsigned()->default(0);
            $table->integer('deals')->unsigned()->default(0);

            $table->text('description')->nullable();
            $table->string('highlights')->nullable();
            
            $table->string('from_place')->nullable();
            $table->string('banner')->nullable();
            
            $table->string('visa')->nullable();
            $table->string('contract_phone')->nullable();

            $table->text('traffic')->nullable();
            $table->text('hotel')->nullable();
            $table->longText('qa')->nullable();
            $table->longText('notes')->nullable();
            $table->longText('memos')->nullable();

            $table->string('tags')->nullable();
            
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
        Schema::drop('products');
    }
}
