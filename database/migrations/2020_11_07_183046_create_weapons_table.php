<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charsheet_id');
            $table->string('name')->nullable();
            $table->string('distance')->nullable();
            $table->string('speed')->nullable();
            $table->string('damage')->nullable();

            $table->foreign('charsheet_id')->references('id')->on('charsheets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapons');
    }
}
