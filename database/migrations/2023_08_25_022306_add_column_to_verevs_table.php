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
        Schema::table('verevs', function (Blueprint $table) {
            $table->bigInteger('profit')->after('event_id');
            $table->bigInteger('physical_availability')->after('event_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verevs', function (Blueprint $table) {
            $table->dropColumn('profit');
            $table->dropColumn('physical_availability');
        });
    }
};
