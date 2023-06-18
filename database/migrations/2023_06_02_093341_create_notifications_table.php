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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('device_id', 16)->collation('latin1_swedish_ci');
            $table->timestamp('read_at');
            $table->timestamps();
        });
        
        Schema::table('notifications', function (Blueprint $table) {
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
        Schema::dropIfExists('notifications');
    }
};