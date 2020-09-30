<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharsheetCharacteristicPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charsheet_characteristic_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charsheet_id');
            $table->unsignedBigInteger('characteristic_id');
            $table->integer('value');

            $table->foreign('charsheet_id')->references('id')->on('charsheets');
            $table->foreign('characteristic_id')->references('id')->on('characteristics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charsheet_characteristic_pivot');
    }
}
