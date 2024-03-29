<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('desc');
            $table->boolean('active')->default(true);
            $table->string('img',255);
            $table->tinyInteger('question_no');
            $table->tinyInteger('difficulty');
            $table->smallInteger('duration_mins');
            $table->foreignId('skill_id')->constrained();
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
        Schema::dropIfExists('exams');
    }
}
