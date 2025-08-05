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
        Schema::create('tabel_penilaian', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('jalan_id')->references('id')->on('tabel_jalan')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignUuid('kriteria_id')->references('id')->on('tabel_kriteria')->cascadeOnUpdate()->cascadeOnDelete();
            $table->float('bobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_penilaian');
    }
};
