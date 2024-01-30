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
        Schema::create('seat_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seat_id');
            $table->foreignId('ticket_id');
            $table->foreignId('seat_log_type_id');
            $table->string('check_in_url');
            $table->json('meta_data');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_logs');
    }
};