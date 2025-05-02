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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('publisher')->nullable();
            $table->year('publication')->nullable();
            $table->string('isbn')->nullable();
            $table->string('category')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->integer('pages')->nullable();
            $table->string('language')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_books');
    }
};
