<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Test User',
        ]);

        Product::factory(5)->sequence(

            ['name' => 'banaan'],
            ['name' => 'appel'],
            ['name' => 'druif'],
            ['name' => 'peer'],
            ['name' => 'mandarijn'],
        )->create();
    }
}
