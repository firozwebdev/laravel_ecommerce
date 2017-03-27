<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOccasionTypeToEproducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eproducts', function($table) {
            $table->integer('occasion_id')->after('mostly_view_flag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eproducts', function($table) {
            $table->dropColumn('occasion_id');
        });
    }
}
