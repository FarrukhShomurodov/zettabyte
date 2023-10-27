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
            $table->foreignId('parent_category_id')->constrained('parent_categories');
            $table->string('title');
            $table->integer('quantity');
            $table->string('images');
            $table->float('price');
            $table->text('description');
            $table->foreignId('delivery_id')->constrained('deliveries');
            $table->integer('sold_quantity');
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
