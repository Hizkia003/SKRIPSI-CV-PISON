<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Drop unused tables: abouts, advantages, missions, services, site_contents, tiktoks, visions.
     * Data from these tables has been hardcoded into frontend Blade views.
     */
    public function up(): void
    {
        Schema::dropIfExists('advantages');
        Schema::dropIfExists('missions');
        Schema::dropIfExists('visions');
        Schema::dropIfExists('tiktoks');
        Schema::dropIfExists('site_contents');
        Schema::dropIfExists('services');
        Schema::dropIfExists('abouts');
    }

    public function down(): void
    {
        // These tables are intentionally not recreated.
        // The data has been hardcoded into the frontend views.
    }
};
