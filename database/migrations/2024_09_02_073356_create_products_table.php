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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_code')->unique();
            $table->unsignedBigInteger('category_product_id')->nullable();
            $table->foreign('category_product_id')->references('id')->on('category_products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete()->cascadeOnUpdate();
            $table->text('description');
            $table->string('stock_quantity');
            $table->string('unit')->nullable(); 
            $table->string('color')->nullable(); 
            $table->string('color_text')->nullable(); 
            $table->string('weight_product')->nullable();
            $table->text('dimensions')->nullable();  // Menggunakan JSON
            $table->bigInteger('regular_price');
            $table->text('main_image');
            $table->text('images')->nullable();
            $table->text('video')->nullable(); // Menambahkan kolom video setelah kolom images            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
