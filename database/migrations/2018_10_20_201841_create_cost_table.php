<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costs', function (Blueprint $table) {
            $table->increments('id');
            $table -> string('subject');
            $table -> integer('unit')->nullable();
            $table -> integer('requested_cost')->nullable();
            $table -> integer('approved_cost')->nullable();
            $table -> string('cost')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('costs', function (Blueprint $table) {
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costs');
    }
}
