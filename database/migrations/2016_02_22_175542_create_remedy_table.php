<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemedyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remedy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('ingredients');
            $table->text('description');
            $table->text('note');
            $table->text('usage');
            $table->string('utility');
            $table->float('ratingPoint');
            $table->string('author');
            $table->string('thumbnailUrl');
            $table->string('imgUrl');
            $table->softDeletes();
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
        Schema::drop('remedy');
    }
}
