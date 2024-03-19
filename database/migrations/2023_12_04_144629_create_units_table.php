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
        if (!Schema::hasTable('units')) {
            Schema::create(
                'units',
                function (Blueprint $table) {
                    $table->id();
                    $table->bigInteger('project_id')->nullable()->unsigned();
                    $table->string('title', 50);
                    $table->string('reference', 10);
                    $table->string('code', 10)->nullable();
                    $table->bigInteger('category_id')->nullable()->unsigned();
                    $table->string('description', 255)->nullable();
                    $table->bigInteger('thumbnail_id')->nullable()->unsigned();
                    $table->string('image', 170)->nullable();
                    $table->bigInteger('creator_id')->nullable()->unsigned();

                    $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
                    $table->foreign('thumbnail_id')->references('id')->on('thumbnails');
                    $table->foreign('creator_id')->references('id')->on('users');

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('units');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
