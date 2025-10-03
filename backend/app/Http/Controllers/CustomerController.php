<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Lettura di tutti i Customer
    public function index()
    {
        return response()->json(Customer::all(), 200);
    }

    // Lettura di un determinato Customer con i suoi ordini
    public function show(Customer $customer)
    {
        // Utilizzo load per caricare la relazione 'orders' dentro l'oggetto $customer
        return $customer->load('orders');
    }
}
