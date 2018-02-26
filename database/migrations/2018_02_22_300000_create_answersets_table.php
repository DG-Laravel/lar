<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answersets', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('questionsetsid')->unsigned();
			$table->integer('usersid')->unsigned();
			
            $table->timestamps();
			
			$table->index('questionsetsid');
			$table->foreign('questionsetsid')->references('id')->on('questionsets');
			$table->index('usersid');
			$table->foreign('usersid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answersets');
    }
}
