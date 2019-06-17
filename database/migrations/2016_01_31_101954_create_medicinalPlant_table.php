<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinalPlantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicinal_plants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('commonName')->unique();
            $table->string('otherName');
            $table->string('scienceName');
            $table->text('characteristic');
            $table->string('location');
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
        Schema::drop('medicinal_plants');
    }
}
