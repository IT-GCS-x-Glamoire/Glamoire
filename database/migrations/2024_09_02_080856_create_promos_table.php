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
            $table->string('image');
            $table->string('min_transaction');
            $table->string('max_transaction');
            $table->text('description');
            $table->string('syarat_ketentuan');
            $table->string('promo_code');
            $table->string('image_promo')->nullable();
            $table->string('image_voucher')->nullable();
            $table->string('image_ongkir')->nullable();
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
