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
        Schema::create('pkrs_posts', function (Blueprint $table) {

            $table->id();

            $table->foreignId('pkrs_category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();

            $table->longText('content')->nullable();

            $table->string('thumbnail');

            $table->enum('type', [
                'image',
                'gallery',
                'video',
            ])->default('image');

            $table->string('video')->nullable();

            $table->string('video_cover')->nullable();

            $table->boolean('featured')->default(false);

            $table->boolean('is_published')->default(true);

            $table->timestamp('published_at')->nullable();

            $table->unsignedBigInteger('views')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkrs_posts');
    }
};
