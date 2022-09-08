<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('food_orders');
        Schema::create('food_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->integer('quantity');
            $table->double('discount_rate')->default(0);
            $table->double('discount')->default(0);
            $table->decimal('price');
            $table->double('special_discount_rate')->default(0);
            $table->double('special_discount')->default(0);
            $table->double('discounted_price');
            $table->double('vat_rate')->default(0);
            $table->double('vat')->default(0);
            $table->string('mobile');
            $table->json('menu_names');
            $table->double('payable_amount');
            $table->string('payment_type')->nullable();
            $table->string('payment_status')->nullable();
            $table->double('net_sale_price');
            $table->unsignedBigInteger('created_by_id')->nullable();;

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
        Schema::dropIfExists('food_orders');
    }
}
