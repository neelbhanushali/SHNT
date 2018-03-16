<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllottedClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allotted_classes', function (Blueprint $table) {
            $table->string('room',10);
            $table->string('name',20);
            $table->string('dept',10); 
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('room')->references('roomnumber')->on('classrooms')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allotted_classes');
    }
}
