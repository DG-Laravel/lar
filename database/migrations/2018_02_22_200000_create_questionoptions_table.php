<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionoptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('option');
			$table->integer('questionsid');
            $table->timestamp('deactivateddate')->nullable();
            $table->timestamps();
			
			$table->index('questionsid');
			$table->foreign('questionsid')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionoptions');
    }
}
