<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
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

        $nameProduct = ["buah garing", "buah melon", "buah gupui", "buah anjay", "buah kacang", "wes emboh", "buah alpukat", "melon", "salak"];
        $imageProduct = ["product-1-1.jpg", "product-2-1.jpg", "product-3-1.jpg", "product-4-1.jpg", "product-5-1.jpg", "product-6-1.jpg", "product-7-1.jpg", "product-8-1.jpg", "product-9-1.jpg"];
        for ($i=0; $i < 9; $i++) { 
            Product::create(
                [
                    "name" => $nameProduct[$i],
                    "price" => $i."000",
                    "image_url" => $imageProduct[$i],
                    "category_id" => mt_rand(1, 2),
                    "stock" => 20
                ]
            );
        }
    }
}
