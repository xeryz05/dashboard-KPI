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
        Schema::table('physicalavailabilitys', function (Blueprint $table) {
            $table->unsignedBigInteger('event_id')->after('id');
 
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('physicalavailabilitys', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
            $table->dropColumn('events');
        });
    }
};
