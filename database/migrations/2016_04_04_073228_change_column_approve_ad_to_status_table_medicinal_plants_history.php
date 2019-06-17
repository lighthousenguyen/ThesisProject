<?php

use Illuminate\Database\Migrations\Migration;

class ChangeColumnApproveAdToStatusTableMedicinalPlantsHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicinal_plants_history', function ($table) {
            $table->string('status')->default('wait');
            $table->dropColumn('approved_ad');
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
            $table->string('approved_ad');
            $table->dropColumn('status');
        });
    }
}
