<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToFormFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form_factors', function (Blueprint $table) {
            $table->integer('form_id')->unsigned();
            $table->integer('factor_id')->unsigned();

            $table->foreign('form_id')->references('id')->on('forms')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('factor_id')->references('id')->on('factors')->onDelete('restrict')->onUpdate('cascade');
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
    }
}
