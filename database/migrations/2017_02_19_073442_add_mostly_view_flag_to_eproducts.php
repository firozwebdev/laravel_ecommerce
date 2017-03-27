<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMostlyViewFlagToEproducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eproducts', function($table) {
            $table->integer('mostly_view_flag')->after('best_sale_flag')->default(0);
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
            $table->dropColumn('mostly_view_flag');
        });
    }
}
