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
        Schema::create('employee_info', function (Blueprint $table) {
            //User to reference
            $table->unsignedBigInteger('user')->primary();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');

            //role
            $table->string('role');
            //airline
            $table->string('airline')->nullable();
            $table->foreign('airline')->references('name')->on('airline')->onDelete('cascade');
            //airport
            $table->string('airport')->nullable();
            $table->foreign('airport')->references('code')->on('airport')->onDelete('cascade');
            //is_executive
            $table->boolean('is_exec');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_info');
    }
};
