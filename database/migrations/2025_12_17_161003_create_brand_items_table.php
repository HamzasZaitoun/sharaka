<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brand_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_section_id')->constrained()->cascadeOnDelete();
            $table->json('title')->nullable(); // Translatable
            $table->string('image_path');
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_items');
    }
};
