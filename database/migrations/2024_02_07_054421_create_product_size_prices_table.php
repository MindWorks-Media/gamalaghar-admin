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
        Schema::create('product_size_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('size_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->float('price');
            $table->integer('product_stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_size_prices');
    }
};
