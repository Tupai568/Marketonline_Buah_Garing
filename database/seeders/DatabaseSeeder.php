<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use GuzzleHttp\Promise\Create;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Seeder Category
        $category = ["Buah", "Sayuran"];
        foreach ($category as $item) {
            Category::create(["name" => $item]);
        }

        User::create(
            [
                "name" => "batubeling",
                "email" => "emailbatubeling@gmail.com",
                "password" => bcrypt("password")
            ]
        );
    }
}
