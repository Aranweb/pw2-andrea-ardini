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

    // Lettura di un determinato Customer
    public function show(Customer $customer)
    {
        return response()->json($customer, 200);
    }

    // Ritorna un customer specifico con i suoi ordini
    public function customerWithOrder(Customer $customer)
    {
        $orders = $customer->orders;
        return response()->json($orders, 200);
        // return $customer->load('orders');
    }
}
