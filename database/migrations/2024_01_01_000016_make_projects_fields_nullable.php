<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->text('description')->nullable()->default(null)->change();
            $table->string('location')->nullable()->default(null)->change();
            $table->string('year')->nullable()->default(null)->change();
            $table->string('client')->nullable()->default(null)->change();
            $table->string('duration')->nullable()->default(null)->change();
            $table->string('status')->default('completed')->change();
            $table->boolean('is_featured')->default(false)->change();
        });
    }

    public function down(): void
    {
        // No rollback needed
    }
};
