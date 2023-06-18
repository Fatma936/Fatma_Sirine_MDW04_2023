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
        Schema::create('site_device', function (Blueprint $table) {
            $table->id();
            $table->string('device_id')->length(16)->collation('latin1_swedish_ci')->index();
            $table->unsignedBigInteger('site_id')->index();
            $table->timestamps();
        
            $table->foreign('device_id')->references('devEUI')->on('appdevices')->onDelete('cascade');
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_device');
    }
};
