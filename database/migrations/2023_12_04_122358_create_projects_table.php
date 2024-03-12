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
            'projects',
            function (Blueprint $table) {
                $table->id();
                $table->string('title', 50);
                $table->string('reference', 10);
                $table->string('code', 10)->nullable();
                $table->string('image', 170)->nullable();
                $table->string('country', 70)->nullable();
                $table->string('city', 70)->nullable();
                $table->bigInteger('framework_id')->nullable()->unsigned();
                $table->foreign('framework_id')->references('id')->on('frameworks')->onDelete('cascade');
                $table->bigInteger('classification_system_id')->nullable()->unsigned();
                $table->foreign('classification_system_id')->references('id')->on('classification_systems')->onDelete('cascade');
                $table->bigInteger('creator_id')->nullable()->unsigned();
                $table->foreign('creator_id')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
    }
};
