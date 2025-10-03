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
        Order::create([
            'customer_id' => 3,
            'order_number' => 'OC0001',
            'description' => 'Camicia da donna bianca taglia M',
            'order_data' => '2025-07-10',
            'total' => 69.99,
        ]);
        Order::create([
            'customer_id' => 1,
            'order_number' => 'OC0002',
            'description' => 'Pantalone uomo di cotone nero taglia 50',
            'order_data' => '2025-08-15',
            'total' => 89.99,
        ]);
        Order::create([
            'customer_id' => 4,
            'order_number' => 'OC0003',
            'description' => 'T-shirt donna manica lunga blu stampa teschio taglia M',
            'order_data' => '2025-09-01',
            'total' => 24.99,
        ]);
        Order::create([
            'customer_id' => 2,
            'order_number' => 'OC0004',
            'description' => 'T-shirt uomo manica lunga verde stampa drago taglia XL',
            'order_data' => '2025-06-28',
            'total' => 24.99,
        ]);
        Order::create([
            'customer_id' => 2,
            'order_number' => 'OC0005',
            'description' => 'Camicia uomo manica corta a righe azzurra/blu taglia 42',
            'order_data' => '2025-05-09',
            'total' => 49.99,
        ]);
        Order::create([
            'customer_id' => 1,
            'order_number' => 'OC0006',
            'description' => 'Giacca elegante uomo, doppio petto nera taglia 52',
            'order_data' => '2025-10-01',
            'total' => 249.99,
        ]);
    }
}
