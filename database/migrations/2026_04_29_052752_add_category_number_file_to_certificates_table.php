<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            // Tambah kolom hanya jika belum ada
            if (!Schema::hasColumn('certificates', 'category')) {
                $table->string('category')->default('company_legalitas');
            }
            if (!Schema::hasColumn('certificates', 'number')) {
                $table->string('number')->nullable();
            }
            if (!Schema::hasColumn('certificates', 'file')) {
                $table->string('file')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropColumn(['category', 'number', 'file']);
        });
    }
};