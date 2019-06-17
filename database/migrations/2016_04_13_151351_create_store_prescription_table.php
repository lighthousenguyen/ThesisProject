<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorePrescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_prescriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('storeCredential');
            $table->string('storeName');
            $table->string('storeAvatar');
            $table->integer('remedyId');
            $table->string('remedyTitle');
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
        Schema::drop('store_prescriptions');
    }
}
