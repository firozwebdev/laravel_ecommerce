<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBestSaleFlagToEproducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eproducts', function($table) {
            $table->integer('best_sale_flag')->after('ecategory_id')->default(0);
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
            $table->dropColumn('best_sale_flag');
        });
    }
}
