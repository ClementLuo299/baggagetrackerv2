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
        Schema::create('flight_leg', function (Blueprint $table) {
            $table->string('flight_id')->primary();
            $table->string('airplane')->primary();
            $table->foreign('airplane')->references('registration_no')->on('airplane')->onDelete('cascade');
            $table->string('origin')->primary();
            $table->foreign('origin')->references('code')->on('airport')->onDelete('cascade');
            $table->string('destination')->primary();
            $table->foreign('destination')->references('code')->on('airport')->onDelete('cascade');
            $table->timestampTz('departure_time');
            $table->timestampTz('arrival_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_leg');
    }
};
