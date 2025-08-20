<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Billing;
use App\Models\Client;

class BillingSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data (optional)
        Billing::truncate();

        // Get all clients
        $clients = Client::all();

        // Define the rate per cubic meter (same as in the form)
        $rate = 30;

        // Create sample billings for each client
        foreach ($clients as $client) {
            // Generate a random reading between 1000 and 5000
            $reading = rand(1000, 5000);

            // Calculate the total based on the reading and rate
            $total = $reading * $rate;

            Billing::create([
                'client_id' => $client->id,
                'reading_date' => now()->subDays(rand(1, 30)), 
                'due_date' => now()->addDays(rand(1, 30)), 
                'reading' => $reading,
                'rate' => $rate,
                'total' => $total, 
                'status' => rand(0, 1), 
            ]);
        }
    }
}