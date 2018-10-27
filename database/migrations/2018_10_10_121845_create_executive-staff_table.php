<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExecutiveStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('executive_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table -> string('fname');
            $table -> string('lname');
            $table -> string('student_id');
            $table -> string('phone_number');
            $table -> string('field');
            $table -> string('votes');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('executive_staffs');
    }
}
