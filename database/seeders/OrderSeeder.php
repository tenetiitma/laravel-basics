<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = resource_path('json/orders.json');

        if (file_exists($filePath)) {
            
            $orders = collect(json_decode(file_get_contents($filePath), true));

            $orders->each(fn($order) => Order::updateOrCreate($order));
        }
    }
}
