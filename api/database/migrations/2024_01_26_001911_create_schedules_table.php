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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('company_id');
            // Nullable incase there's no available rides
            $table->foreignId('ride_id')->nullable();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            // $table->foreign('ride_id')
            //     ->references('id')
            //     ->on('rides');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign('schedules_company_id_foreign');
            // $table->dropForeign('schedules_ride_id_foreign');
        });
        Schema::dropIfExists('schedules');
    }
};
