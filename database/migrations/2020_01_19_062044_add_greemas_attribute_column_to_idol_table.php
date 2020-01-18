<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGreemasAttributeColumnToIdolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('idols', function (Blueprint $table) {
            $table->string('greemas_type','10')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('idols', function (Blueprint $table) {
            $table->dropColumn('greemas_type');
        });
    }
}
