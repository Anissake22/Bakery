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
        Schema::create('orderslines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_order');
            $table->foreign('id_order')->references('id')->on('orders');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('id')->on('products');
            $table->integer('qte');
            $table->date('date_admin_validation_order');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderslines');
    }
};
