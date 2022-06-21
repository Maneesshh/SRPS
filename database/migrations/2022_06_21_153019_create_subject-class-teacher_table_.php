<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('subject-class-teacher', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('class_id');
        $table->unsignedBigInteger('subject_id');
        $table->unsignedBigInteger('teacher_id');
        $table->foreign('class_id')->references('id')->on('classes')->restrictOnDelete();
        $table->foreign('subject_id')->refecrences('id')->on('subjects')->restrictOnDelete();  
        $table->foreign('teacher_id')->references('id')->on('users')->restrictOnDelete();;
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
        //
    }
};
