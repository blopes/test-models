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
            'user_details',
            function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id')->nullable()->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('profession', 50)->nullable();
                $table->string('specialization', 50)->nullable();
                $table->string('academic_level', 50)->nullable();
                $table->string('prof_order_number', 25)->nullable();
                $table->string('country', 50)->nullable();
                $table->string('city', 50)->nullable();
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
        Schema::dropIfExists('user_details');
    }
};
