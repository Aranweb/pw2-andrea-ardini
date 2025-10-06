<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Le funzioni index e show non vengono create perchè l'entità ordini viene richiamata dal load dell'index dell'entità cliente.
    // Nell'applicazione non vengono mai mostrati solo gli ordini ma sempre associati al cliente collegato.
    
    // Creazione entità Ordine
    public function store(Request $request)
    {
        
        // Validazione dei campi in creazione
        $validated = $request->validate([
            'customer_id'=>['required', 'integer', 'exists:customers,id'],
            'order_number'=>['required', 'string', 'unique:orders,order_number', 'max:4'], // nel frontend costruisco poi l'ordine tipo OC0001
            'description'=>['required', 'string'],
            'order_data'=>['required', 'date'],
            'total'=>['required', 'numeric', 'min:0'],
        ], [
            'customer_id.required' => 'Il codice cliente è obbligatorio',
            'customer_id.exists' => 'Il codice cliente specificato non esiste',
            'order_number.required'=> 'Il numero di ordine è obbligatorio',
            'order_number.unique'=> 'Il numero di ordine inserito esiste già',
            'order_number.max'=> 'Il numero di ordine non può essere più lungo di 4 caratteri',
            'description.required'=> 'La descrizione è obbligatoria',
            'order_data.required'=> 'La data ordine è obbligatoria',
            'total.required'=> 'Il totale ordine è obbligatorio',
            'total.min'=> 'Il totale ordine non può essere inferiore a zero',
        ]);
        
        $order = Order::create($validated);
        
        return response()->json($order, 201);
    }
    
    // Aggiornamento entità Ordine
    public function update(Request $request, Order $order)
    {
        
        // Validazione dei campi in aggiornamento
        $validated = $request->validate([
            'customer_id'=>['sometimes', 'integer', 'exists:customers,id'],
            'order_number'=>['sometimes', 'string', 'unique:orders,order_number,'.$order->id, 'max:4'], 
            'description'=>['sometimes', 'string'],
            'order_data'=>['sometimes', 'date'],
            'total'=>['sometimes', 'numeric', 'min:0'],
        ], [
            'customer_id.required' => 'Il codice cliente è obbligatorio',
            'customer_id.exists' => 'Il codice cliente specificato non esiste',
            'order_number.required'=> 'Il numero di ordine è obbligatorio',
            'order_number.unique'=> 'Il numero di ordine inserito esiste già',
            'order_number.max'=> 'Il numero di ordine non può essere più lungo di 4 caratteri',
            'description.required'=> 'La descrizione è obbligatoria',
            'order_data.required'=> 'La data ordine è obbligatoria',
            'total.required'=> 'Il totale ordine è obbligatorio',
            'total.min'=> 'Il totale ordine non può essere inferiore a zero',
        ]);

        $order->update($validated);

        return response()->json($order, 200);
    }

    // Cancellazione entità Ordine
    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(null, 204);
    }
}
