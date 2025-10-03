<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'Mario Rossi',
            'image' => 'customers/customer-1-large.jpg',
            'address' => 'Viale Roma 1, 47924 Rimini',
            'email' => 'mario.rossi@info.it',
        ]);
        Customer::create([
            'name' => 'Giuseppe Verdi',
            'image' => 'customers/customer-2-large.jpg',
            'address' => 'Via Italia 3, 20019 Milano',
            'email' => 'giuseppe.verdi@info.it',
        ]);
        Customer::create([
            'name' => 'Chiara Bianchi',
            'image' => 'customers/customer-3-large.jpg',
            'address' => 'Largo Piemonte 5, 00100 Roma',
            'email' => 'chiara.bianchi@info.it',
        ]);
        Customer::create([
            'name' => 'Laura Neri',
            'image' => 'customers/customer-4-large.jpg',
            'address' => 'Piazza del popolo 7, 40100 Bologna',
            'email' => 'laura.neri@info.it',
        ]);
    }
}
