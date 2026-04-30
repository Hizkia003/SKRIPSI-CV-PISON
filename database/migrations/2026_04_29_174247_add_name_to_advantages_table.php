<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('advantages', function (Blueprint $table) {
            $table->string('name')->after('id');
            // Jika ingin mengganti content menjadi description, kita bisa biarkan
            // Gunakan content sebagai description di aplikasi
        });
    }

    public function down(): void
    {
        Schema::table('advantages', function (Blueprint $table) {
            $table->dropColumn('name');
        });
    }
};