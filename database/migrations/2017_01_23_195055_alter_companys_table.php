<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companys', function (Blueprint $table) {
            //
            $table->string('website', 50)->nullable()->change();
            $table->string('codigop', 50)->nullable()->change();
            $table->string('telefono', 50)->nullable()->change();
            $table->string('estado', 500);
            $table->enum('relacion',['Cliente','Proveedor', 'Cliente/Proveedor']);
            $table->enum('tipo_prove',['Fuel/Handling','FBO/Handler', 'Broker','Supplier'])->nullable();
            $table->string('certificacion', 100)->nullable();
            $table->string('contacto_admin', 100);
            $table->string('celular', 50)->nullable();
            $table->string('correo_admin', 70);
            $table->string('telefono_admin', 50);
            $table->string('banco', 50)->nullable();
            $table->string('cuenta', 50)->nullable();
            $table->string('direccion_cuenta', 50)->nullable();
            $table->string('aba', 50)->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companys', function (Blueprint $table) {
            //
            $table->string('website', 50);
            $table->string('codigop', 50);
            $table->string('telefono', 50);
            $table->dropColumn('estado', 500);
            $table->dropColumn('relacion',['Cliente','Proveedor', 'Cliente/Proveedor']);
            $table->dropColumn('tipo_prove',['Fuel/Handling','FBO/Handler', 'Broker','Supplier'])->nullable();
            $table->dropColumn('certificacion', 100)->nullable();
            $table->dropColumn('contacto_admin', 100);
            $table->dropColumn('celular', 50)->nullable();
            $table->dropColumn('correo_admin', 70);
            $table->dropColumn('telefono_admin', 50);
            $table->dropColumn('banco', 50)->nullable();
            $table->dropColumn('cuenta', 50)->nullable();
            $table->dropColumn('direccion_cuenta', 50)->nullable();
            $table->dropColumn('aba', 50)->nullable();
        });
    }
}
