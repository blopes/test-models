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
            'agent_actions',
            function (Blueprint $table) {
                $table->id();

                $table->bigInteger('project_id')->nullable()->unsigned();
                $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

                $table->bigInteger('unit_id')->nullable()->unsigned();
                $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');

                $table->bigInteger('agent_id')->nullable()->unsigned();
                $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');

                $table->bigInteger('stage_id')->nullable()->unsigned();
                $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');

                $table->bigInteger('user_id')->nullable()->unsigned();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

                $table->bigInteger('creator_id')->nullable()->unsigned();
                $table->foreign('creator_id')->references('id')->on('users');

                $table->string('contracted_by', 70)->nullable();

                $table->boolean('is_pending')->default(false);
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
        Schema::dropIfExists('agent_actions');
    }
};
