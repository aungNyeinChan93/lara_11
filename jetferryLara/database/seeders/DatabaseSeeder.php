<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CustomerSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory(10)->create();

        User::factory(2)->admin()->create();

        $this->call([
            CustomerSeeder::class,
            TypeSeeder::class,
            JobPositionSeeder::class,
            PostSeeder::class,
            EmployerSeeder::class,
            CommentSeeder::class,
            LanguageSeeder::class,
        ]);
    }
}
