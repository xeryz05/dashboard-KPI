<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viitems', function (Blueprint $table) {
            $table->unsignedBigInteger('period_id')->after('id');
 
            $table->foreign('period_id')->references('id')->on('periods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viitems', function (Blueprint $table) {
            $table->dropForeign(['period_id']);
            $table->dropColumn('periods');
        });
    }
};
