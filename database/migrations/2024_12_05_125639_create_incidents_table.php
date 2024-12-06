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
        Schema::create('incidents', function (Blueprint $table) {
            $table->string('incident_id')->primary();
            $table->boolean('is_damaged');
            $table->boolean('is_lost');
            $table->boolean('is_delayed');
            $table->timestampTz('incident_time');
            $table->boolean('is_resolved');
            $table->text('description')->nullable();
            $table->string('location');
            $table->foreign('location')->references('name')->on('location')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
