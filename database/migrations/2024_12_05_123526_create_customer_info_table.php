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
        Schema::create('customer_info', function (Blueprint $table) {
            //User to reference
            $table->unsignedBigInteger('user')->primary();
            $table->foreign('user')->references('id')->on('users')->onDelete('cascade');

            //passport
            $table->string('passport_no');

            //country
            $table->string('country_citizenship');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_info');
    }
};
