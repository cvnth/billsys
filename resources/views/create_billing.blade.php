@extends('layouts.app')

@section('title', 'Create Billing')

@section('content')


<div class="container">
    <h2 class="h3 mb-0 text-gray-800">Create New Billing</h2>

    
    @if ($errors->any())
        <div class="alert alert-danger">
            
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <br></br>
    
    <form action="{{ route('billing.store') }}" method="POST">
        @csrf

        <div class="form-group">
    <label for="client_id">Client: </label>
    <select name="client_id" id="client_id" class="form-control">
        @foreach($clients as $client)
            <option value="{{ $client->id }}">{{ $client->firstname }} {{ $client->lastname }}</option>
        @endforeach
    </select>
</div>
        <div class="form-group">
            <label for="reading_date">Reading Date: </label>
            <input type="date" name="reading_date" id="reading_date" class="form-control" value="{{ old('reading_date') }}">
        </div>

     
        <div class="form-group">
            <label for="due_date">Due Date:</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date') }}">
        </div>

        
        <div class="form-group">
            <label for="reading">Current Reading / Cubic Meter Use: </label>
            <input type="number" step="0.01" name="reading" id="reading" class="form-control" value="{{ old('reading') }}" oninput="calculateTotal()">
        </div>
       
        <div class="form-group">
            <label for="rate">Rate per Cubic Meter: </label>
            <input type="number" name="rate" id="rate" class="form-control" value="30" readonly>
        </div>

        <div class="form-group">
            <label for="total">Total Amount: </label>
            <input type="text" name="total" id="total" class="form-control" value="{{ old('total') }}" readonly>
</div>

<script>
    function calculateTotal() {
        const currentReading = parseFloat(document.getElementById('reading').value) || 0;
        const rate = parseFloat(document.getElementById('rate').value) || 0;
        const total = (currentReading) * rate
        const finalTotal = total < 0 ? 0 : total;

        document.getElementById('total').value = finalTotal.toFixed(2);
    }  
</script>


        <div class="form-group">
            <label for="status">Status: </label>
            <select name="status" id="status" class="form-control">
                <option value="0">Pending </option>
                <option value="1">Paid </option>
            </select>
        </div>

       
        <button type="submit" class="btn btn-primary">Create Billing</button>
    </form>
@endsection
