<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flat_option', function (Blueprint $table) {
            $table->unsignedBigInteger('flat_id');
            $table->foreign('flat_id')->references('id')->on('flats');
            $table->unsignedBigInteger('option_id');
            $table->foreign('option_id')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flat_option');
    }
}
