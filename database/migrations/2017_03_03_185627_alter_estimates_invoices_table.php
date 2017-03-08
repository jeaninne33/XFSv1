<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEstimatesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('resumen',500)->nullable()->change();
          //  $table->date('fecha_pago')->nullable();
            //$table->string('metodo_pago')->nullable();
            //
        });
        Schema::table('estimates', function (Blueprint $table) {
        //    $table->double('total_descuento', 10, 2)->default(0);
            $table->string('resumen',500)->nullable()->change();
        });
        Schema::table('dates_invoices', function (Blueprint $table) {
            $table->string('descripcion',300)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
              $table->string('resumen',500)->change();
              $table->dropColumn('fecha_pago');
              $table->dropColumn('metodo_pago');
        });

        Schema::table('estimates', function (Blueprint $table) {
            //
            //  $table->dropColumn('total_descuento');
              $table->string('resumen',500)->change();
        });
        Schema::table('dates_invoices', function (Blueprint $table) {
            $table->dropColumn('descripcion',300);
        });
    }
}
