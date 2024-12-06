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
        Schema::create('itinerary_flights', function (Blueprint $table) {
            $table->string('booking_id')->primary();
            $table->foreign('booking_id')->references('booking_id')->on('itinerary')->onDelete('cascade');
            $table->string('flight_id')->primary();
            $table->foreign('flight_id')->references('flight_id')->on('flight_leg')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary_flights');
    }
};
