<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateExecutiveStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('executive_staffs', function (Blueprint $table) {
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
        Schema::table('executive_staffs', function (Blueprint $table) {
            //
        });
    }
}
