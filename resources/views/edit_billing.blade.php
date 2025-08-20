@extends('layouts.app')

@section('title', 'Edit Billing')

@section('content')
    <h3 class="h3 mb-0 text-gray-800">Edit Billing</h3>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('update.billing', $billing->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" id="client_id" class="form-control">
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $client->id == $billing->client_id ? 'selected' : '' }}>
                        {{ $client->firstname }} {{ $client->lastname }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reading_date">Reading Date</label>
            <input type="date" name="reading_date" id="reading_date" class="form-control" value="{{ $billing->reading_date }}">
        </div>

        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ $billing->due_date }}">
        </div>

        <div class="form-group">
            <label for="reading">Current Reading</label>
            <input type="number" name="reading" id="reading" class="form-control" value="{{ $billing->reading }}" oninput="calculateTotal()">
        </div>

        <div class="form-group">
            <label for="rate">Rate per Cubic</label>
            <input type="number" name="rate" id="rate" class="form-control" value="{{ $billing->rate }}" readonly>
        </div>

        <div class="form-group">
            <label for="total">Total Amount</label>
            <input type="text" name="total" id="total" class="form-control" value="{{ number_format(($billing->reading - $billing->previous) * $billing->rate, 2) }}" readonly>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ $billing->status == 1 ? 'selected' : '' }}>Paid</option>
                <option value="0" {{ $billing->status == 0 ? 'selected' : '' }}>Pending</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Billing</button>
    </form>
@endsection
