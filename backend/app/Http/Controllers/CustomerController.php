<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

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
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:customers,email'],
        ],[
            'name.required' => 'Il campo nome è obbligatorio',
            'image.image' => 'Il file caricato deve essere un\'immagine',
            'image.mimes' => 'Il file caricato deve essere in uno di questi formati: jpeg, png, jpg, gif',
            'image.max' => 'Il file caricato non deve superare i 2MB',
            'address.required' => 'Il campo indirizzo è obbligatorio',
            'email.required' => 'Il campo mail è obbligatorio',
            'email.unique' => 'Il campo mail è già presente in archivio',
        ]);

        if ($request->hasFile('image')) {
            // Salvo il file immagine nella cartella 'public/customers' e ottengo il percorso
            $path = $request->file('image')->store('customers', 'public');
            $validated['image'] = $path;
        }

        $customer = Customer::create($validated);

        return response()->json($customer, 201);
    }

    public function updateWithFile(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email'   => 'required|email|unique:customers,email,' . $customer->id,
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Gestione del file immagine se presente
        if ($request->hasFile('image')) {
            // Elimino l'immagine precedente se esiste
            if ($customer->image) {
                Storage::disk('public')->delete($customer->image);
            }

            // Salvo la nuova immagine
            $path = $request->file('image')->store('customers', 'public');
            $validated['image'] = $path;
        }

        $customer->update($validated);
        return response()->json($customer);
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
