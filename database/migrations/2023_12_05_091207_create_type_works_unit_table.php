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
        if (!Schema::hasTable('type_works_unit')) {
            Schema::create(
                'type_works_unit',
                function (Blueprint $table) {
                    $table->id();
                    $table->bigInteger('type_works_id')->nullable()->unsigned();
                    $table->bigInteger('unit_id')->nullable()->unsigned();

                    $table->foreign('type_works_id')->references('id')->on('type_works')->onDelete('cascade');
                    $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

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
        Schema::dropIfExists('type_works_unit');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
