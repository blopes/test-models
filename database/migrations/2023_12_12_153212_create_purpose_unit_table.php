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
        Schema::create('purpose_unit', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('purpose_id')->nullable()->unsigned();
            $table->foreign('purpose_id')->references('id')->on('purposes')->onDelete('cascade');

            $table->bigInteger('unit_id')->nullable()->unsigned();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

            $table->bigInteger('creator_id')->nullable()->unsigned();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purpose_unit');
    }
};
