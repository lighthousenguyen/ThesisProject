<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemedyHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remedies_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('remedyId');
            $table->text('description');
            $table->string('usage');
            $table->string('ingredient');
            $table->text('note');
            $table->string('utility');
            $table->string('author');
            $table->string('thumbnailUrl');
            $table->string('imgUrl');
            $table->string('type');
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
        Schema::drop('remedies_history');
    }
}
