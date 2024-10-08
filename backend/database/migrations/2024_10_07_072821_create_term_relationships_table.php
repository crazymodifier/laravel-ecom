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
        Schema::create('term_relationships', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->unsignedBigInteger('product_id'); // Reference to products table
            $table->unsignedBigInteger('term_id'); // Reference to terms table
            $table->unsignedBigInteger('tax_id')->nullable(); // Optional taxonomy ID
            $table->string('tax_slug')->nullable(); // Optional slug for taxonomy
            $table->timestamps(); // Created at and updated at timestamps
        
            // Foreign keys
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('tax_id')->references('id')->on('taxonomies')->onUpdate('cascade')->onDelete('cascade');
        
            // Indexing for faster lookups
            $table->index('product_id');
            $table->index('term_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_relationships');
    }
};
