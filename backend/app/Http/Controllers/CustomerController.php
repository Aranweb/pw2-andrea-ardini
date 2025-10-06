<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

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

    // Creazione entità Cliente
    public function store(Request $request) {

        // Validazione dei campi in creazione
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'image' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:customers,email'],
        ],[
            'name.required' => 'Il campo nome è obbligatorio',
            'address.required' => 'Il campo indirizzo è obbligatorio',
            'email.required' => 'Il campo mail è obbligatorio',
            'email.unique' => 'Il campo mail è già presente in archivio',
        ]);

        $customer = Customer::create($validated);

        return response()->json($customer, 201);
    }

    // Aggiornamento entità Cliente
    public function update(Request $request, Customer $customer) {

        // Validazione dei campi in aggiornamento
        $validated = $request->validate([
            'name' => ['sometimes', 'string'],
            'image' => ['sometimes', 'string'],
            'address' => ['sometimes', 'string'],
            'email' => ['sometimes', 'string', 'unique:customers,email,'.$customer->id],
        ],[
            'name.required' => 'Il campo nome è obbligatorio',
            'address.required' => 'Il campo indirizzo è obbligatorio',
            'email.required' => 'Il campo mail è obbligatorio',
            'email.unique' => 'Il campo mail è già presente in archivio',
        ]);

        $customer->update($validated);

        return response()->json($customer, 200);
    }

    // Cancellazione entità Cliente
    public function destroy(Customer $customer) {
        $customer->delete();

        return response()->json(null, 204);
    }
}
