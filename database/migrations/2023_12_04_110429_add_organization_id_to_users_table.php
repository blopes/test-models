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
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->bigInteger('organization_id')->nullable()->unsigned()->after('picture');
                $table->bigInteger('thumbnail_id')->nullable()->unsigned();
                
                $table->foreign('organization_id')->references('id')->on('organizations')->after('picture');
                $table->foreign('thumbnail_id')->references('id')->on('thumbnails');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                //
            }
        );
    }
};
