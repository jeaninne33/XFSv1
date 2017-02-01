<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterAvionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aviones', function (Blueprint $table) {
            $table->string('nombre',50)->nullable();
            $table->string('modelo',50)->nullable();
            $table->string('fabricante',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aviones', function (Blueprint $table) {
          $table->dropColumn('nombre',50)->nullable();
          $table->dropColumn('modelo',50)->nullable();
          $table->dropColumn('fabricante',50)->nullable();
        });
    }
}
