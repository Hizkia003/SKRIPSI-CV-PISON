<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('jasa_konstruksi_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jasa_konstruksi_id')
                ->constrained('jasa_konstruksi')
                ->onDelete('cascade');
            $table->string('image');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jasa_konstruksi_images');
    }
};