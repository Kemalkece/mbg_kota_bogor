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
        Schema::create('regulasi', function (Blueprint $table) {
            $table->id();
            $table->string('file_pdf');
            $table->string('judul');
            $table->text('deskripsi');
            $table->enum('status', ['Berlaku', 'Aktif', 'Wajib']);
            $table->date('tahun');
            $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnDelete();
            $table->integer('urutan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulasi');
    }
};
