@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="h3 mb-0 text-gray-800">Edit Client</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT') 
        
        <div class="form-group">
            <label for="code">Client Id:</label>
            <input type="text" name="client_id" class="form-control" value="{{ old('client_id', $client->client_id) }}" required>
        </div>
        
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" class="form-control" value="{{ old('firstname', $client->firstname) }}" required>
        </div>
        
        <div class="form-group">
            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" class="form-control" value="{{ old('middlename', $client->middlename) }}">
        </div>
        
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" class="form-control" value="{{ old('lastname', $client->lastname) }}" required>
        </div>
        
        <div class="form-group">
            <label for="contact">Contact Number:</label>
            <input type="text" name="contact" class="form-control" value="{{ old('contact', $client->contact) }}" required>
        </div>
        
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" class="form-control" required>{{ old('address', $client->address) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="meter_code">Meter Code:</label>
            <input type="text" name="meter_code" class="form-control" value="{{ old('meter_code', $client->meter_code) }}" required>
        </div>
        
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1" {{ $client->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $client->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
