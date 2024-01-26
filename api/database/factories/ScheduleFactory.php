<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'test',
            'company_id' => '1',
            'ride_id' => null,
            'start_date' => now()->format('Y-m-d H:i:s'),
            'end_date' => now()->format('Y-m-d H:i:s'), 
        ];
    }
}
