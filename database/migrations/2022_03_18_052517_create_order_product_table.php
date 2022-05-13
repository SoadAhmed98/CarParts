<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->tinyInteger('quantity');
            $table->decimal('price');
            $table->tinyInteger('discount')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=>pending ,1=>shipped');
            $table->foreignId('product_id')->constrained();
            $table->foreignId('order_id')->constrained();
            $table->primary(['product_id', 'order_id']);
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
        Schema::dropIfExists('order_product');
    }
};
