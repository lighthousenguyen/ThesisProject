<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPlantIdTableMedicinalPlantsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicinal_plants_history', function ($table) {
            $table->string('plantId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medicinal_plants_history', function ($table) {
            $table->dropColumn('plantId');
        });
    }
}
