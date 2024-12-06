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
        Schema::create('notification_subject', function (Blueprint $table) {
            $table->string('notification_id')->primary();
            $table->foreign('notification_id')->references('notification_id')->on('notification')->cascadeOnDelete();
            $table->string('tracker_id')->primary();
            $table->foreign('tracker_id')->references('tracker_id')->on('baggage')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_subject');
    }
};
