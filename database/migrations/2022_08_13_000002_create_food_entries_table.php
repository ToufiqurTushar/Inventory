<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_name');
            $table->string('image')->nullable();
            $table->double('production_cost');
            $table->double('sale_cost');
            $table->double('member_discount')->nullable();
            $table->double('special_discount')->nullable();
            $table->double('others_discount')->nullable();
            $table->unsignedBigInteger('created_by_id');

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
        Schema::dropIfExists('food_entries');
    }
}
