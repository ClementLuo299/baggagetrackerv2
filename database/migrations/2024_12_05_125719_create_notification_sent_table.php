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
        Schema::create('notification_sent', function (Blueprint $table) {
            $table->string('notification_id')->primary();
            $table->foreign('notification_id')->references('notification_id')->on('notification')->cascadeOnDelete();
            $table->string('recipient')->primary();
            $table->foreign('recipient')->references('id')->on('user')->cascadeOnDelete();
            $table->string('sender');
            $table->foreign('sender')->references('user')->on('employee_info')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_sent');
    }
};
