<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDatesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dates_invoices', function (Blueprint $table) {
            //
              $table->dropForeign('dates_invoices_categoria_id_foreign');
              $table->dropColumn('categoria_id');
              $table->dropColumn('total_recarga');
              $table->double('subtotal_recarga', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dates_invoices', function (Blueprint $table) {
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->double('total_recarga', 10, 2);
        });
    }
}
