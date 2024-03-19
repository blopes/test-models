<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('users')) {
            Schema::create(
                'users',
                function (Blueprint $table) {
                    $table->id();
                    $table->string('first_name', 50);
                    $table->string('last_name', 50);
                    $table->string('email')->unique();
                    $table->timestamp('email_verified_at')->nullable();
                    $table->string('password');
                    $table->string('picture', 170)->nullable();
                    $table->bigInteger('organization_id')->nullable()->unsigned();
                    $table->string('phone_number', 70)->nullable();
                    $table->bigInteger('thumbnail_id')->nullable()->unsigned();

                    $table->foreign('organization_id')->references('id')->on('organizations');
                    $table->foreign('thumbnail_id')->references('id')->on('thumbnails');

                    $table->rememberToken();
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
        Schema::dropIfExists('users');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
