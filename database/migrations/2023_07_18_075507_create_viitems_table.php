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
        Schema::create('viitems', function (Blueprint $table) {
            $table->id();
            $table->string('area',50);
            $table->string('kpi',100);
            $table->string('calculation');
            $table->bigInteger('target');
            $table->integer('weight');
            $table->biginteger('realization')->nullable();
            $table->biginteger('created_by')->unsigned();
            $table->biginteger('updated_by')->unsigned();
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
        Schema::dropIfExists('viitems');
    }
};
