<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing;
use App\Models\Client;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::with('client')->get();

        foreach ($billings as $billing) {
            $billing->total = ($billing->reading - $billing->previous) * $billing->rate;
        }

        return view('billings', compact('billings'));
    }

    public function create()
    {
        $clients = Client::all();

        return view('create_billing', compact('clients'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|integer',
            'reading_date' => 'required|date',
            'due_date' => 'required|date',
            'reading' => 'required|numeric',
            'rate' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $validatedData['total'] = ($validatedData['reading']) * $validatedData['rate'];

        Billing::create([
            'client_id' => $validatedData['client_id'],
            'reading_date' => $validatedData['reading_date'],
            'due_date' => $validatedData['due_date'],
            'reading' => $validatedData['reading'],
            'rate' => $validatedData['rate'],
            'status' => $validatedData['status'],
            'total' => $validatedData['total'],
        ]);

        return redirect()->route('billings.index')->with('success', 'Billing created successfully.');
    }

    public function edit($id)
    {
        $billing = Billing::find($id);

        if (!$billing) {
            return redirect()->route('billings.index')->with('error', 'Billing record not found.');
        }

        $clients = Client::all();

        return view('edit_billing', compact('billing', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|integer',
            'reading_date' => 'required|date',
            'due_date' => 'required|date',
            'reading' => 'required|numeric',
            'rate' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $billing = Billing::find($id);
        if (!$billing) {
            return redirect()->route('billings.index')->with('error', 'Billing record not found.');
        }

        $billing->update([
            'client_id' => $validatedData['client_id'],
            'reading_date' => $validatedData['reading_date'],
            'due_date' => $validatedData['due_date'],
            'reading' => $validatedData['reading'],
            'rate' => $validatedData['rate'],
            'status' => $validatedData['status'],
            'total' => ($validatedData['reading'] * $validatedData['rate']),
        ]);

        return redirect()->route('billings.index')->with('success', 'Billing updated successfully.');
    }

    public function destroy($id)
    {
        $billing = Billing::find($id);

        if (!$billing) {
            return redirect()->route('billings.index')->with('error', 'Billing not found.');
        }

        $billing->delete();

        return redirect()->route('billings.index')->with('success', 'Billing deleted successfully.');
    }

    public function show($id)
    {
        return $this->showReceipt($id);
    }

    public function showReceipt($id)
    {
        $billing = Billing::with('client')->findOrFail($id);

        return view('billings.receipt', compact('billing'));
    }

    public function billing()
    {
        $billingCount = Billing::count();

        return view('main.home', compact('billingCount'));
    }
}
