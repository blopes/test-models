<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('type_works')) {
            Schema::create(
                'type_works',
                function (Blueprint $table) {
                    $table->id();
                    $table->string('name', 100);
                }
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('type_works');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
