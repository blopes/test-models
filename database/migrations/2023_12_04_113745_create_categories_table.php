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
        if (!Schema::hasTable('categories')) {
            Schema::create(
                'categories',
                function (Blueprint $table) {
                    $table->id();
                    $table->string('name', 200);
                    $table->string('logo', 170)->nullable();
                    $table->bigInteger('frame_id')->nullable()->unsigned();

                    $table->foreign('frame_id')->references('id')->on('frameworks')->onDelete('cascade');
                }
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
