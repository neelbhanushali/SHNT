<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->bigInteger('exam_form_id')->unsigned();
            $table->foreign('exam_form_id')->references('id')->on('exam_forms')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ia1', 3)->nullable();
            $table->string('ia2', 3)->nullable();
            $table->string('ese', 3)->nullable();
            $table->string('tw', 3)->nullable();
            $table->string('oral', 3)->nullable();
            $table->string('pror', 3)->nullable();
            $table->boolean('success')->default(0);
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
        Schema::dropIfExists('scores');
    }
}
