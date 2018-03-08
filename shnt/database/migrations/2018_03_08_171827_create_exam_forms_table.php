<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('examination_id')->unsigned();
            $table->foreign('examination_id')->references('id')->on('examinations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('rollnumber', 20);
            $table->foreign('rollnumber')->references('rollnumber')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->string('seatnumber', 15)->nullable();
            $table->boolean('kt')->default(0);
            $table->string('month', 20);
            $table->decimal('half', 1, 0);
            $table->decimal('year', 4, 0);
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
        Schema::dropIfExists('exam_forms');
    }
}
