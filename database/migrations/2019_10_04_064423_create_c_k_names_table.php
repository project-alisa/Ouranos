<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCKNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_k_names', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idol_id')->unique();
            $table->text('name_zh')->nullable();
            $table->text('name_ko')->nullable();
            $table->integer('name_zh_separate')->nullable();
            $table->integer('name_ko_separate')->nullable();
            $table->text('subname_zh')->nullable();
            $table->text('subname_ko')->nullable();
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
        Schema::dropIfExists('c_k_names');
    }
}
