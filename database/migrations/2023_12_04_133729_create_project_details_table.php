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
        Schema::create(
            'project_details',
            function (Blueprint $table) {
                $table->id();
                $table->bigInteger('project_id')->nullable()->unsigned();
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
                $table->string('description')->nullable();
                $table->string('address')->nullable();
                $table->unsignedBigInteger('budget')->nullable();
                $table->string('asset_owner', 50)->nullable();
                $table->bigInteger('user_id')->nullable()->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('project_details');
    }
};
