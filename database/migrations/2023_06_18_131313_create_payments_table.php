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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->String('full_name');
            $table->String('email');
            $table->String('address');
            $table->String('city');
            $table->String('state');
            $table->String('zip_code');
            $table->String('name_on_card');
            $table->String('credit_card_number');
            $table->String('exp_month');
            $table->String('exp_year');
            $table->String('CVV');
            $table->String('total');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
