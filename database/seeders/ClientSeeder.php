<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = resource_path('json/clients.json');

        if (file_exists($filePath)) {
            
            $clients = collect(json_decode(file_get_contents($filePath), true));

            $clients->each(fn($client) => Client::updateOrCreate($client));
        }
    }
}
