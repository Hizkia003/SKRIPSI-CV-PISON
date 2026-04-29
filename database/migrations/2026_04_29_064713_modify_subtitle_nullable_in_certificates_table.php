<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah subtitle menjadi nullable
        DB::statement('ALTER TABLE certificates MODIFY subtitle VARCHAR(255) NULL');
        
        // (Opsional) Jika kolom image juga tidak dipakai, ubah juga menjadi nullable
        // DB::statement('ALTER TABLE certificates MODIFY image VARCHAR(255) NULL');
    }

    public function down(): void
    {
        // Kembalikan ke NOT NULL jika diperlukan (hati-hati dengan data null yang sudah ada)
        DB::statement('ALTER TABLE certificates MODIFY subtitle VARCHAR(255) NOT NULL');
    }
};