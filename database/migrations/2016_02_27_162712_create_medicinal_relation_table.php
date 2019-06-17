<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinalRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remedy_ingredients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('remedyId');
            $table->integer('medicinalPlantId');
            $table->string('medicinalPlantName');
            $table->string('dosage');
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
        Schema::drop('remedy_ingredients');
    }
}
