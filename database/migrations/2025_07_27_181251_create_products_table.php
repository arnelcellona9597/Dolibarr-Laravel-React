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
            $table->unsignedBigInteger('wc_product_id')->nullable();           // WooCommerce product ID
            $table->unsignedBigInteger('dolibarr_product_id')->nullable();     // Dolibarr product ID
            $table->json('data')->nullable();                                  // JSON field for product data
            $table->boolean('data_is_synched')->default(false);                // Sync status for data
            $table->boolean('has_image')->default(false);                      // If product has image
            $table->boolean('image_is_synched')->default(false);               // Sync status for image
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
