<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('short', 6);
            $table->string('code', 10);
            $table->string('department', 5);
            $table->decimal('semester', 2, 0);
            $table->string('ia1', 3)->nullable();
            $table->string('ia2', 3)->nullable();
            $table->string('ese', 3)->nullable();
            $table->string('tw', 3)->nullable();
            $table->string('oral', 3)->nullable();
            $table->string('pror', 3)->nullable();
            $table->string('c_th', 3)->nullable();
            $table->string('c_pt', 3)->nullable();
            $table->string('c_tut', 3)->nullable();
            $table->timestamps();
            $table->bigInteger('examination_id')->unsigned();
            $table->foreign('examination_id')->references('id')->on('examinations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
