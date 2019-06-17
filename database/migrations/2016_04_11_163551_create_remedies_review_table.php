<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemediesReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remedies_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reviewed');
            $table->string('reviewer');
            $table->longText('comment');
            $table->integer('ratingPoint');
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
        Schema::drop('remedies_reviews');
    }
}
