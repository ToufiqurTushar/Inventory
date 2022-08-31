<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks_in', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->unsignedBigInteger('created_by_id');
            $table->string('Product_type');
            $table->integer('expiry_days');
            $table->double('initial_stock');
            $table->double('alerm_stock');
            $table->string('m_by_u');
            $table->string('product_image');

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
        Schema::dropIfExists('stocks_in');
    }
}
