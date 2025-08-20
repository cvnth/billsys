<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ClientSeeder::class, // Seeder for clients
            BillingSeeder::class, // Seeder for billings
            AdminSeeder::class, // Seeder for admin user
        ]);
    }
}