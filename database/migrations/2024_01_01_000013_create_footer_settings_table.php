<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('footer_settings', function (Blueprint $table) {
            $table->id();

            // Brand
            $table->string('brand_name')->default('PISON TEKNIK');
            $table->string('brand_tagline')->default('Kontraktor Profesional');
            $table->text('description')->nullable();

            // Kontak
            $table->string('company_name')->default('CV. PISON TEKNIK INDONESIA');
            $table->text('address')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('working_hours')->nullable();

            // Sosmed
            $table->string('tiktok')->nullable();

            // Copyright
            $table->string('copyright_text')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('footer_settings');
    }
};