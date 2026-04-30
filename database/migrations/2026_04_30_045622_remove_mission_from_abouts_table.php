<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            // Hapus kolom mission jika masih ada
            if (Schema::hasColumn('abouts', 'mission')) {
                $table->dropColumn('mission');
            }
            // Jika ada kolom advantage juga, hapus
            if (Schema::hasColumn('abouts', 'advantage')) {
                $table->dropColumn('advantage');
            }
        });
    }

    public function down(): void
    {
        Schema::table('abouts', function (Blueprint $table) {
            $table->text('mission')->nullable();
        });
    }
};