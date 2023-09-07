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
            $table->unsignedBigInteger('departement_id')->after('id');
 
            $table->foreign('departement_id')->references('id')->on('departements');
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
            $table->dropForeign(['departement_id']);
            $table->dropColumn('departements');
        });
    }
};
