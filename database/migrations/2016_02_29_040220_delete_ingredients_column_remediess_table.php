<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteIngredientsColumnRemediessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('remedies', 'ingredients')) {
            Schema::table('remedies', function ($table) {
                $table->dropColumn('ingredients');
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
        if ( ! Schema::hasColumn('remedies', 'ingredients')) {
            Schema::table('remedies', function ($table) {
                $table->string('ingredients');
            });
        }
    }
}
