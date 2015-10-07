<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique();
            $table->string('wechat')->nullable();
            $table->integer('levels')->unsigned()->default(0);
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->integer('account')->default(0);
            $table->integer('states')->default(1);
            $table->string('role')->default('user');
            $table->integer('sex')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('wechat');
            $table->dropColumn('levels');
            $table->dropColumn('address');
            $table->dropColumn('description');
            $table->dropColumn('account');
            $table->dropColumn('states');
            $table->dropColumn('role');
            $table->dropColumn('sex');
        });
    }
}
