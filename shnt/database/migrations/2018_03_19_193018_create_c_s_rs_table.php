<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCSRsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_s_rs', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('teacher_th')->nullable();
            // $table->foreign('teacher_th')->references('username')->on('staff')->onDelete('cascade')->onUpdate('cascade');
            $table->string('teacher_pt')->nullable();
            // $table->foreign('teacher_pt')->references('username')->on('staff')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('c_s_rs');
    }
}
