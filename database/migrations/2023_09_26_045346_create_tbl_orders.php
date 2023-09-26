<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('table_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->dateTime('order_date');
            $table->dateTime('order_time');
            $table->json('items');
            $table->timestamps();

            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('table_id')->references('id')->on('tables');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
