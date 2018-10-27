<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_factors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->integer('factor_id');
            $table->timestamps();
        });


        Schema::create('form_factors', function (Blueprint $table) {
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
        Schema::dropIfExists('form_factors');
    }
}
