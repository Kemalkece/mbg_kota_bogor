<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Buat tabel access_tokens.
     *
     * Tabel ini menyimpan semua token API yang dikeluarkan oleh sistem.
     * Token yang tersimpan BUKAN token mentah, melainkan hash SHA-256-nya,
     * sehingga tokennya tidak pernah berada dalam teks biasa di database.
     */
    public function up(): void
    {
        Schema::create('access_tokens', function (Blueprint $table) {
            // Primary key auto-increment.
            $table->id();

            // Foreign key ke tabel users.
            // Jika user dihapus, semua token miliknya juga terhapus (CASCADE).
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Hash SHA-256 dari token mentah yang dikirim ke client (64 karakter hex).
            // Dibuat unik agar tidak ada dua token yang sama.
            $table->string('token', 64)->unique();

            // Label/nama token (opsional) agar mudah diidentifikasi.
            // Contoh: "Token Mobile App", "Token Integrasi Sistem X"
            $table->string('name')->nullable();

            // Jika true → token sudah dicabut dan tidak bisa dipakai lagi.
            $table->boolean('revoked')->default(false);

            // Waktu kedaluwarsa token.
            // Null berarti token tidak ada batas waktu.
            $table->timestamp('expires_at')->nullable();

            // Timestamps: created_at dan updated_at.
            $table->timestamps();
        });
    }

    /**
     * Hapus tabel access_tokens (rollback).
     */
    public function down(): void
    {
        Schema::dropIfExists('access_tokens');
    }
};
