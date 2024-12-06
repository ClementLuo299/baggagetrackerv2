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
        Schema::create('location_update', function (Blueprint $table) {
            $table->timestampTz('time');
            $table->string('tracker_id');
            $table->primary(['tracker_id','time']);
            $table->string('location_name');
            $table->foreign('location_name')->references('name')->on('location')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_update');
    }
};
