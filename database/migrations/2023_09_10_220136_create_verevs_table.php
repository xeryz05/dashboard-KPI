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
        Schema::create('verevs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('value');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('job_id');
            $table->timestamps();
            
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('job_id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('verevs');
    }
};