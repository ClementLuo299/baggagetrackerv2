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
        Schema::create('incident_employees', function (Blueprint $table) {
            $table->string('incident_id');
            $table->foreign('incident_id')->references('incident_id')->on('incidents')->cascadeOnDelete();
            $table->unsignedBigInteger('employee');
            $table->primary(['incident_id','employee']);
            $table->foreign('employee')->references('user')->on('employee_info')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incident_employees');
    }
};
