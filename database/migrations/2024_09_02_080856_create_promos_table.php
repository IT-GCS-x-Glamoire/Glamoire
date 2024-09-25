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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('promo_name');
            $table->string('type');
            $table->string('diskon');
            $table->date('start_date');
            $table->date('end_date');
            $table->unsignedBigInteger('category_product_id')->nullable();
            $table->foreign('category_product_id')->references('id')->on('category_products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();            
            $table->string('min_transaction')->nullable();
            $table->string('max_transaction')->nullable();
            $table->text('description')->nullable();
            $table->string('terms_conditions')->nullable();
            $table->bigInteger('sale_price')->nullable();
            $table->string('promo_code')->nullable();
            $table->string('image')->nullable();         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
