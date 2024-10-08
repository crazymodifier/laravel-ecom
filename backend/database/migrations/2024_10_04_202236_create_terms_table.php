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
        Schema::create('terms', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('tax_id')->default(1); // Taxonomy identifier
            $table->string('name'); // Name of the term
            $table->string('slug')->unique(); // URL-friendly version of the term
            $table->string('thumbnail')->nullable(); // Path to the thumbnail image
            $table->unsignedBigInteger('parent')->nullable(); // Nullable parent term ID
            $table->string('status')->default('active'); // Status (e.g., active, inactive)
            $table->timestamps(); // Created at and updated at timestamps
            
            // Foreign key for parent term
            $table->foreign('parent')->references('id')->on('terms')->onDelete('cascade');
            // Foreign key for taxonomy
            $table->foreign('tax_id')->references('id')->on('taxonomies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terms');
    }
};
