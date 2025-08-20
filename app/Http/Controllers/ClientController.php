<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Billing;

class ClientController extends Controller
{  

    public function index()
    {

        $clients = Client::all();

        return view('clients', compact('clients'));
    }

     

    public function create()
    {
        return view('create_clients'); 
    }
    
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'client_id' => 'required|unique:clients,client_id',
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'lastname' => 'required|string',
            'contact' => 'required|string',
            'address' => 'required|string',
            'meter_code' => 'required|string',
            'status' => 'required',
        ]);

        Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit($id)
{
   
    $client = Client::find($id);

    
    if (!$client) {
        return redirect()->route('clients.index')->with('error', 'Client not found.');
    }
    return view('edit_clients', compact('client'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_id' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'meter_code' => 'required',
            'status' => 'required|boolean',
        ]);
    
        $client = Client::find($id);
        $client->update($request->all());
    
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }
    public function destroy($id)
{
    $client = Client::find($id);

    if (!$client) {
        return redirect()->route('clients.index')->with('error', 'Client not found.');
    }

    $client->delete();

    return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
}

public function show($id)
{
    $client = Client::find($id);

 
    if (!$client) {
        return redirect()->route('clients.index')->with('error', 'Client not found.');
    }

    return view('clients.show', compact('client')); 
}

public function user()
{
 
    $clientCount = Client::count();
    $billingCount = Billing::count();

    return view('main.home', compact('clientCount', 'billingCount'));
}

    
}
