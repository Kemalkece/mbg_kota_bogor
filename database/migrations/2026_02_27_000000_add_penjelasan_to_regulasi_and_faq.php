<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('regulasi', function (Blueprint $table) {
            $table->text('penjelasan')->nullable()->after('deskripsi');
        });

        Schema::table('faq', function (Blueprint $table) {
            $table->text('penjelasan')->nullable()->after('jawaban');
        });
    }

    public function down(): void
    {
        Schema::table('regulasi', function (Blueprint $table) {
            $table->dropColumn('penjelasan');
        });

        Schema::table('faq', function (Blueprint $table) {
            $table->dropColumn('penjelasan');
        });
    }
};
