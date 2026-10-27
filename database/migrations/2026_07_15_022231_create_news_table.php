<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            // Informasi utama
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');

            // Thumbnail
            $table->string('thumbnail')->nullable();

            // Kategori
            $table->string('category')->default('Berita');

            // Penulis
            $table->string('author')->default('Administrator');

            // Status
            $table->enum('status', ['draft', 'published'])->default('draft');

            // Featured/Homepage
            $table->boolean('featured')->default(false);

            // Statistik
            $table->unsignedBigInteger('views')->default(0);

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // Publish
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index('status');
            $table->index('featured');
            $table->index('published_at');
            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
