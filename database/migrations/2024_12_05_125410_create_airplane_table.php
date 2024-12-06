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
        Schema::create('airplane', function (Blueprint $table) {
            $table->string('registration_no')->primary();
            $table->string('type')->nullable();
            $table->integer('capacity');
            $table->integer('payload');
            $table->string('airline')->nullable();
            $table->foreign('airline')->references('name')->on('airline')->onDelete('cascade');
            $table->string('destination')->nullable();
            $table->foreign('destination')->references('code')->on('airport')->onDelete('cascade');
            $table->string('coordinates')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airplane');
    }
};
