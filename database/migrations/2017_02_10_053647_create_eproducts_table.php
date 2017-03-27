<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ecategory_id');
            $table->string('product_title');
            $table->text('product_description');
            $table->string('product_image');
            $table->double('product_price');
            $table->string('product_type');
            $table->integer('product_quantity');
            $table->boolean('publication_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('eproducts');
    }
}
