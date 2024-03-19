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
        if (!Schema::hasTable('organizations')) {
            Schema::create(
                'organizations',
                function (Blueprint $table) {
                    $table->id();
                    $table->string('name')->unique();
                    $table->string('email')->unique()->nullable();
                    $table->string('phone_number', 30)->unique()->nullable();
                    $table->string('sector', 50)->nullable();
                    $table->bigInteger('thumbnail_id')->nullable()->unsigned();
                    $table->string('logo')->nullable();
                    $table->string('description', 255)->nullable();
                    $table->boolean('is_registered')->default(false);

                    $table->foreign('thumbnail_id')->references('id')->on('thumbnails');

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
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
