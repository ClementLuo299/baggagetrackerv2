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
        Schema::create('location', function (Blueprint $table) {
            $table->string('name')->primary();
            $table->string('coordinates');
            $table->string('airport')->nullable();
            $table->string('airplane')->nullable();
            $table->foreign('airport')->references('code')->on('airport')->onDelete('cascade');
            $table->string('type')->nullable();
        });         
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
