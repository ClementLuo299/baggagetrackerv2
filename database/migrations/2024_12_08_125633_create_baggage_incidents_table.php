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
        Schema::create('baggage_incidents', function (Blueprint $table) {
            $table->string('tracker_id');
            $table->foreign('tracker_id')->references('tracker_id')->on('baggage')->onDelete('cascade');
            $table->string('incident');
            $table->primary(['tracker_id','incident']);
            $table->foreign('incident')->references('incident_id')->on('incidents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baggage_incidents');
    }
};
