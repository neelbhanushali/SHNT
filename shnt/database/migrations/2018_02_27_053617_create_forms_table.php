<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('examination_id')->unsigned();
            $table->foreign('examination_id')->references('id')->on('examinations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('rollnumber', 20);
            $table->foreign('rollnumber')->references('rollnumber')->on('students')->onDelete('cascade')->onUpdate('cascade');
            $table->string('seatnumber', 15)->nullable();
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
        Schema::dropIfExists('forms');
    }
}
