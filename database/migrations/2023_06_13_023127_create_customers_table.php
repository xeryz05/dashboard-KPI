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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);

            $table->bigInteger('value_jan')->nullable();
            $table->bigInteger('value_feb')->nullable();
            $table->bigInteger('value_mar')->nullable();
            $table->bigInteger('value_apr')->nullable();
            $table->bigInteger('value_mei')->nullable();
            $table->bigInteger('value_juni')->nullable();
            $table->bigInteger('value_juli')->nullable();
            $table->bigInteger('value_agust')->nullable();
            $table->bigInteger('value_sept')->nullable();
            $table->bigInteger('value_okt')->nullable();
            $table->bigInteger('value_nov')->nullable();
            $table->bigInteger('value_des')->nullable();

            $table->bigInteger('total');
            
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
        Schema::dropIfExists('customers');
    }
};
