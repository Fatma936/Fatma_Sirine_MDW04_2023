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
        Schema::create('images_device', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->string('device_id')->length(16)->collation('latin1_swedish_ci')->index();
            $table->foreign('device_id')->references('devEUI')->on('appdevices')->onDelete('cascade');
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
        Schema::dropIfExists('images_device');
    }
};
