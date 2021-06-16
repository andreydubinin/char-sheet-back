<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CharsheetType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('charsheets', function (Blueprint $table) {
            $table->unsignedInteger('type')->nullable();
        });

        Schema::table('characteristics', function (Blueprint $table) {
            $table->unsignedInteger('charsheet_type')->nullable();
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
            $table->dropColumn('type');
        });

        Schema::table('characteristics', function (Blueprint $table) {
            $table->dropColumn('charsheet_type');
        });
    }
}
