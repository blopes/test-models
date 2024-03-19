<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('classification_systems')) {
            Schema::create(
                'classification_systems',
                function (Blueprint $table) {
                    $table->id();
                    $table->string('name', 50);
                    $table->string('logo', 170)->nullable();
                }
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classification_systems');
    }
};
