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
        Schema::create('baggage_carousel', function (Blueprint $table) {
            $table->string('name');
            $table->foreign('name')->references('name')->on('location')->cascadeOnDelete();
            $table->string('coordinates');
            $table->foreign('coordinates')->references('coordinates')->on('location')->cascadeOnDelete();
            $table->string('airport');
            $table->foreign('airport')->references('code')->on('airport')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baggage_carousel');
    }
};
