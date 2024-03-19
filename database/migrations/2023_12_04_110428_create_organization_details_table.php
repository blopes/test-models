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
            'organization_details',
            function (Blueprint $table) {
                $table->id();
                $table->bigInteger('organization_id')->nullable()->unsigned();
                $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
                $table->string('areas_experience')->nullable();
                $table->string('website')->nullable();
                $table->string('address')->nullable();
                $table->string('country', 70)->nullable();
                $table->string('city', 70)->nullable();
                $table->bigInteger('size_id')->nullable()->unsigned();
                $table->foreign('size_id')->references('id')->on('organization_size')->onDelete('cascade');
                $table->bigInteger('creator_id')->nullable()->unsigned();
                $table->foreign('creator_id')->references('id')->on('users');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_details');
    }
};
