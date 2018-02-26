<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('answersetsid');
			$table->integer('questionoptionsid');
			
            $table->timestamps();
			
			$table->index('answersetsid');
			$table->foreign('answersetsid')->references('id')->on('answersets');
			$table->index('questionoptionsid');
			$table->foreign('questionoptionsid')->references('id')->on('questionoptions');
			$table->unique(['answersetsid','questionoptionsid']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
