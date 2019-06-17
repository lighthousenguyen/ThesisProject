<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsStatusAndAvatarToCredentialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('credentials', function ($table) {
            $table->string('status');
            $table->string('avatar');
        });
        Schema::table('members', function ($table) {
            $table->dropColumn('avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('credentials', function ($table) {
            $table->dropColumn('status');
            $table->dropColumn('avatar');
        });
        Schema::table('members', function ($table) {
            $table->string('avatar');
        });
    }
}
