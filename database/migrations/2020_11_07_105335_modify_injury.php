<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyInjury extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charsheets', function (Blueprint $table) {
            $table->dropColumn('injury');
            $table->unsignedInteger('wounds')->nullable();
            $table->unsignedInteger('fatigue')->nullable();
        });

        Schema::table('charsheets', function (Blueprint $table) {
            $table->jsonb('injury')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('charsheets', function (Blueprint $table) {
            $table->dropColumn('injury');
            $table->dropColumn('wounds');
            $table->dropColumn('fatigue');
        });

        Schema::table('charsheets', function (Blueprint $table) {
            $table->unsignedInteger('injury')->nullable();
        });
    }
}
