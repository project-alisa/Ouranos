<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idols', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',30);
            $table->string('name_y',30);
            $table->string('name_r',50)->unique();
            $table->string('subname',30)->nullable();
            $table->integer('name_separate')->nullable();
            $table->integer('name_y_separate')->nullable();
            $table->integer('name_r_separate')->nullable();
            $table->string('type',30);
            $table->date('birthdate');
            $table->integer('age');
            $table->integer('height');
            $table->double('weight');
            $table->enum('bloodtype',['A','B','O','AB']);
            $table->string('handedness',2);
            $table->integer('bust');
            $table->integer('weist');
            $table->integer('hip');
            $table->string('birthplace',30);
            $table->string('hobby',50)->nullable();
            $table->string('skill',50)->nullable();
            $table->string('favorite',50)->nullable();
            $table->string('cv',30)->nullable();
            $table->string('color',6)->nullable();
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
        Schema::dropIfExists('idols');
    }
}
