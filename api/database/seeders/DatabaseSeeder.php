<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Otp;
use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use App\Models\Company;
use App\Models\RideType;
use App\Models\Ride;
use App\Models\Seat;
use App\Models\SeatLog;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->has(
                Otp::factory()
            )
            ->hasAttached(
                Role::factory()->count(2)
                    ->hasAttached(
                        Permission::factory()
                    )
            )->create();
        
        Company::factory()->create();
        RideType::factory()->create();
        Schedule::factory()->create();
        Ride::factory()->create();
        Seat::factory()->create();
        SeatLog::factory()->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
