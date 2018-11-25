<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('coefficient');

            $table->integer('level');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('factors', function (Blueprint $table) {
            $table->integer('parent')->unsigned()->nullable();
            $table->foreign('parent')->references('id')->on('factors')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factors');
    }
}
