<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditFieldsCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::table('companys', function (Blueprint $table) {
        $table->string('contacto_admin', 100)->nullable()->change();
        $table->string('correo_admin', 70)->nullable()->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('companys', function (Blueprint $table) {
           $table->string('contacto_admin', 100)->change();
           $table->string('correo_admin', 70)->change();
        });

    }
}
