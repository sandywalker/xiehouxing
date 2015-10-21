<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToGuideCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guide_comments', function (Blueprint $table) {
            $table->integer('isbest')->unsigned()->default(0); 
            $table->integer('istop')->unsigned()->default(0); 
            $table->integer('likes')->unsigned()->default(0); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guide_comments', function (Blueprint $table) {
            $table->dropColumn('isbest');
            $table->dropColumn('istop');
            $table->dropColumn('likes');
        });
    }
}
