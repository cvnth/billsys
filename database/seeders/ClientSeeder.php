<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data (optional)
        Client::truncate();

        // Create sample clients
        Client::create([
            'client_id' => 'C12345',
            'firstname' => 'John',
            'middlename' => 'A.',
            'lastname' => 'Doe',
            'contact' => '1234567890',
            'address' => '123 Main St',
            'meter_code' => 'M12345',
            'status' => 1,
        ]);

        Client::create([
            'client_id' => 'C12345',  
            'firstname' => 'Jane',
            'middlename' => 'B.',
            'lastname' => 'Smith',
            'contact' => '0987654321',
            'address' => '456 Elm St',
            'meter_code' => 'M67890',
            'status' => 1,
        ]);

        // Optionally, use factories for more data
        // Client::factory()->count(10)->create();
    }
}