<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamCellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_cell', function (Blueprint $table) {
            $table->string('username', 20);
            $table->string('firstname', 30);
            $table->string('middlename', 30)->nullable();
            $table->string('lastname', 30)->nullable();
            $table->string('mothername', 30)->nullable();
            $table->string('gender', 1)->nullable();
            $table->string('email')->unique();
            $table->string('contact')->unique();
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->primary('username');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_cell');
    }
}
