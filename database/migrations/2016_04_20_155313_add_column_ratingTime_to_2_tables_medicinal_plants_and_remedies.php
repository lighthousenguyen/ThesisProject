<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnRatingTimeTo2TablesMedicinalPlantsAndRemedies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('remedies', function ($table) {
            $table->integer('ratingTime')->default(0);
        });
        Schema::table('medicinal_plants', function ($table) {
            $table->integer('ratingTime')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remedies', function ($table) {
            $table->dropColumn('ratingTime');
        });
        Schema::table('medicinal_plants', function ($table) {
            $table->dropColumn('ratingTime');
        });
    }
}
