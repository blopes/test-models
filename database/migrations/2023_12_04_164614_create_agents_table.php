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
        if (!Schema::hasTable('agents')) {
            Schema::create(
                'agents',
                function (Blueprint $table) {
                    $table->id();
                    $table->string('title', 50);
                    $table->boolean('is_custom');
                    $table->timestamps();
                    $table->softDeletes();
                }
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
