<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brand_sections', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // e.g. 'alqubtan', 'cinema', 'sharaka'
            $table->json('title'); // Translatable
            $table->json('subtitle')->nullable(); // Translatable
            $table->json('description')->nullable(); // Translatable (Array of strings)
            $table->string('logo_text')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brand_sections');
    }
};
