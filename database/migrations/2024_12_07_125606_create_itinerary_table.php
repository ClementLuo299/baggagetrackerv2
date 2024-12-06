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
        Schema::create('itinerary', function (Blueprint $table) {
            $table->string('booking_id')->unique();
            $table->string('passport_no');
            $table->primary(['booking_id','passport_no']);
            $table->foreign('passport_no')->references('passport_no')->on('customer_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerary');
    }
};
