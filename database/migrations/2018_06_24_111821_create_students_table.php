<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id');
            $table->string('student_name');
            $table->string('student_roll');
            $table->string('student_father');
            $table->string('student_mother');
            $table->string('student_emial');
            $table->string('student_phone');
            $table->string('student_department');
            $table->string('student_address');
            $table->string('student_year');
            $table->string('student_password');
            $table->string('student_image');
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
        Schema::dropIfExists('students');
    }
}
