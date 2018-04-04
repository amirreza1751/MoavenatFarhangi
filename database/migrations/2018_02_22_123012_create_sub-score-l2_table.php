<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubScoreL2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_score_l2s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject_l2');
            $table->integer('coefficient_l2');
            $table->integer('sub_score_l2')->nullable();
            $table->integer('sub_score_id')->unsigned();
            $table->foreign('sub_score_id')->references('id')->on('sub_scores');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_score_l2s');
    }
}
