<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
			$table->integer('questionsetsid')->unsigned();
			//ideally wouldn't store as enum due to limitations created by using enum datatype, would prefer full other table
			$table->enum('questiontype', ['radio','checkbox']); 
            $table->timestamp('deactivateddate')->nullable();
            $table->timestamps();
			
			$table->index('questionsetsid');
			$table->foreign('questionsetsid')->references('id')->on('questionsets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
