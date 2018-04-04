<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForumIDExecutiveStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('executive_staffs', function (Blueprint $table) {
            $table -> string('forum_post')->nullable();
            $table->integer('forum_id')->unsigned()->nullable();
            $table->foreign('forum_id')->references('id')->on('forums')->onDelete('restrict')->onUpdate('cascade');
         
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
