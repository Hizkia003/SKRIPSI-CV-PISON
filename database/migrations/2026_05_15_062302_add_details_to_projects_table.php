<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            if (!Schema::hasColumn('projects', 'description')) {
                $table->text('description')->nullable()->after('location');
            }
            if (!Schema::hasColumn('projects', 'client')) {
                $table->string('client')->nullable()->after('description');
            }
            if (!Schema::hasColumn('projects', 'year')) {
                $table->string('year')->nullable()->after('client');
            }
            if (!Schema::hasColumn('projects', 'duration')) {
                $table->string('duration')->nullable()->after('year');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
};
