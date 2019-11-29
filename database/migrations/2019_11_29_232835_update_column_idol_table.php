<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnIdolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @throws \Doctrine\DBAL\DBALException
     * @return void
     */
    public function up()
    {
        DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');

        Schema::table('idols', function (Blueprint $table) {
            $table->string('type',30)->nullable()->change();
            $table->date('birthdate')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->integer('height')->nullable()->change();
            $table->float('weight')->nullable()->change();
            $table->string('bloodtype')->nullable()->change();
            $table->string('handedness',2)->nullable()->change();
            $table->integer('bust')->nullable()->change();
            $table->integer('waist')->nullable()->change();
            $table->integer('hip')->nullable()->change();
            $table->string('birthplace',30)->nullable()->change();
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
            //
        });
    }
}
