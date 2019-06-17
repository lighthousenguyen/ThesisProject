<?php

use Illuminate\Database\Migrations\Migration;

class AddColumnIngredientToRemedyTable extends Migration
{
    public function up()
    {
        if ( ! Schema::hasColumn('remedies', 'ingredients')) {
            Schema::table('remedies', function ($table) {
                $table->string('ingredients');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('remedies', 'ingredients')) {
            Schema::table('remedies', function ($table) {
                $table->dropColumn('ingredients');
            });
        }
    }
}
