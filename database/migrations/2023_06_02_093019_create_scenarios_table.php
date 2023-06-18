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
        Schema::create('scenarios', function (Blueprint $table) {
            $table->id();
            $table->integer('min');
            $table->integer('max');
            $table->integer('normal');
            $table->string('device_id', 16)->collation('latin1_swedish_ci');
            $table->timestamps();
        });
        
        Schema::table('scenarios', function (Blueprint $table) {
            $table->foreign('device_id')->references('devEUI')->on('appdevices');
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scenarios');
    }
};