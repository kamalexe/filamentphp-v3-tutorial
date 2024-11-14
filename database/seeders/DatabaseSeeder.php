<?php


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Temporarily disable foreign key checks
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the users table to delete all existing users
        User::truncate();

        // Check if the admin user already exists
        User::firstOrCreate(
            ['email' => 'admin@example.com'], // Condition: Check if email exists
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'), // Ensure a default password is set
                'is_admin' => true, // Admin flag
            ]
        );

        // Re-enable foreign key checks
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Call other seeders
        $this->call(CountrySeeder::class);
        $this->call(StateSeeder::class);
        $this->call(CitySeeder::class);
    }
}
