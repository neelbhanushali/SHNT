<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
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
            $table->string('department', 10)->nullable();
            $table->tinyInteger('class')->nullable();
            $table->boolean('hod')->default(0);
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
        Schema::dropIfExists('staff');
    }
}
