<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisingFlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising_flat', function (Blueprint $table) {
            $table->unsignedBigInteger('advertising_id');
            $table->foreign('advertising_id')->references('id')->on('advertisings');
            $table->unsignedBigInteger('flat_id');
            $table->foreign('flat_id')->references('id')->on('flats');
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
        Schema::dropIfExists('advertising_flat');
    }
}
