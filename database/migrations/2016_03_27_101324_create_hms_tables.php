<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHmsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('herbal_medicine_stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accountName');
            $table->string('email');
            $table->string('storename');
            $table->text('address');
            $table->string('phonenumber');
            $table->string('representative');
            $table->text('galleryImage');
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
        Schema::drop('herbal_medicine_stores');
    }
}
