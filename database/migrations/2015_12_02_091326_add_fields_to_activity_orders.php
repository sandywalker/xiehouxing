<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToActivityOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_orders', function (Blueprint $table) {
            $table->string('bank_code')->nullable();
            $table->dateTime('pay_time')->nullable();
            $table->integer('paying')->defult(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_orders', function (Blueprint $table) {
            $table->dropColumn('bank_code');
            $table->dropColumn('pay_time');
            $table->dropColumn('paying');
        });
    }
}
