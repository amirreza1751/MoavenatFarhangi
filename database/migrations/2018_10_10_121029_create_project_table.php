<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('type');
            $table->string('place');
            $table->text('purpose')->nullable();
            $table->text('sideway_programs')->nullable();
            $table->text('detailed_programs')->nullable();
            $table->text('innovation')->nullable();
            $table->text('sponsors')->nullable();
            $table->text('description')->nullable();
            $table->string('letter_number');
            $table->string('manager_sign')->nullable();
            $table->string('expert_sign')->nullable();
            $table->string('level');
            $table->integer('capacity');
            $table->integer('cost')->nullable();
            $table->integer('final_cost')->nullable();
            $table->string('suggest_form')->nullable();
            $table->string('final_report')->nullable();
            $table->string('documentation')->nullable();
            $table->float('grade')->nullable();
            $table->string('master')->nullable();
            $table->softDeletes();
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->integer('forum_id')->unsigned();
            $table->foreign('forum_id')->references('id')->on('forums')->onDelete('restrict')->onUpdate('cascade');
        });

        Schema::table('projects', function (Blueprint $table) {
            $table->date('start_date');
            $table->time('start_time');
            $table->date('end_date')->nullable();
            $table->time('end_time')->nullable();
            $table->Integer('total_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
