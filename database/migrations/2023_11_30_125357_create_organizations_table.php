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
            'organizations',
            function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('email')->unique()->nullable();
                $table->string('phone_number', 30)->unique()->nullable();
                $table->string('sector', 50)->nullable();
                $table->bigInteger('thumbnail_id')->nullable()->unsigned();
                $table->foreign('thumbnail_id')->references('id')->on('thumbnails');
                $table->string('logo')->nullable();
                $table->string('description', 255)->nullable();
                $table->boolean('is_registered')->default(false);
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('organizations');
        $table->dropSoftDeletes();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
