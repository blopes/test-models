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
        if (!Schema::hasTable('users')) {
            if (!Schema::hasTable('users')) {
                Schema::create(
                    'project_users',
                    function (Blueprint $table) {
                        $table->id();
                        $table->bigInteger('project_id')->nullable()->unsigned();
                        $table->bigInteger('unit_id')->nullable()->unsigned();
                        $table->bigInteger('user_id')->nullable()->unsigned();
                        $table->bigInteger('organization_id')->nullable()->unsigned();

                        $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
                        $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
                        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                        $table->foreign('organization_id')->references('id')->onDelete('set null')->on('organizations');

                        $table->timestamps();
                        $table->softDeletes();
                    }
                );
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_users');
    }
};
