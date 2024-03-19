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
        Schema::create(
            'stages',
            function (Blueprint $table) {
                $table->id();
                $table->integer('value');
                $table->string('name');
                $table->string('color_code');
                $table->bigInteger('stage_chapter_id')->nullable()->unsigned();
                $table->foreign('stage_chapter_id')->references('id')->on('stage_chapters')->onDelete('cascade');
                $table->bigInteger('framework_id')->nullable()->unsigned();
                $table->foreign('framework_id')->references('id')->on('frameworks')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('stages');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
