<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SeatLog>
 */
class SeatLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'seat_id' => '1',
            'ticket_id' => '1',
            'seat_log_type_id' => '1',
            'check_in_url' => 'https://',
            'meta_data' => json_encode(['field' => 'test']),
        ];
    }
}
