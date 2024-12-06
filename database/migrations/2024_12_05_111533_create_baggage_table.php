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
        Schema::create('baggage', function (Blueprint $table) {
            $table->string('tracker_id')->primary();
            $table->string('passport_no')->primary();
            $table->foreign('passport_no')->references('customer_info')->on('passport_no')->onDelete('cascade');
            $table->string('tracker_type')->nullable();
            $table->string('booking_id');
            $table->foreign('booking_id')->references('booking_id')->on('itinerary')->onDelete('cascade');
            $table->boolean('is_time_sensitive');
            $table->boolean('is_hazardous');
            $table->decimal('baggage_weight',10,2)->nullable();
            $table->string('airplane')->nullable();
            $table->foreign('airplane')->references('registration_no')->on('airplane')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baggage');
    }
};
