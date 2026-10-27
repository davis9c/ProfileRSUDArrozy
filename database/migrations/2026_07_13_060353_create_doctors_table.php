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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('specialist')->nullable();

            // Nama Poli
            $table->string('clinic');

            // foto
            $table->string('photo')->nullable();

            // Rawat Jalan / Pelayanan Penunjang
            $table->enum('category', [
                'rawat_jalan',
                'pelayanan_penunjang'
            ])->default('rawat_jalan');

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
