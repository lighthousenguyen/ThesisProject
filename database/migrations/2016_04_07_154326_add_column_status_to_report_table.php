<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStatusToReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medicinal_plants_reports', function ($table) {
            $table->string('status')->default('wait');
        });
        Schema::table('remedies_reports', function ($table) {
            $table->string('status')->default('wait');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('remedies_reports', function ($table) {
            $table->dropColumn('status');
        });

        Schema::table('medicinal_plants_reports', function ($table) {
            $table->dropColumn('status');
        });
    }
}
