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
            $table->string('flight_id')->unique();
            $table->string('airplane');
            $table->foreign('airplane')->references('registration_no')->on('airplane')->onDelete('cascade');
            $table->string('origin');
            $table->foreign('origin')->references('code')->on('airport')->onDelete('cascade');
            $table->string('destination');
            $table->foreign('destination')->references('code')->on('airport')->onDelete('cascade');
            $table->primary(['flight_id','airplane','origin','destination']);
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
