<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharsheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charsheets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('player_name')->nullable();
            $table->string('conception')->nullable();
            $table->string('appearance')->nullable();
            $table->string('slogan')->nullable();
            $table->unsignedInteger('step')->nullable();
            $table->unsignedInteger('defense')->nullable();
            $table->unsignedInteger('resistance')->nullable();
            $table->unsignedInteger('charisma')->nullable();
            $table->unsignedInteger('experience')->nullable();
            $table->unsignedInteger('injury')->nullable();
            $table->jsonb('flaws')->nullable();
            $table->jsonb('traits')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charsheets');
    }
}
