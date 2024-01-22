<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $customer = Customer::factory(4)->create([
            'name' => 'Test User',
        ])
            ->each(function (customer $customer) {
                (Order::factory(1)
                    ->create([
                        'customer_id' => $customer->id
                    ]));
            });


        Product::factory(5)->sequence(

            ['name' => 'banaan'],
            ['name' => 'appel'],
            ['name' => 'druif'],
            ['name' => 'peer'],
            ['name' => 'mandarijn'],
        )->create();
    }
}
