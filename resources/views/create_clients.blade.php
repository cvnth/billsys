@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="h3 mb-0 text-gray-800">Create New Client</h2>
    
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
    <form action="{{ route('saveStore') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Client Id:</label>
            <input type="text" name="client_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" name="firstname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="middlename">Middle Name:</label>
            <input type="text" name="middlename" class="form-control">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" name="lastname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contact">Contact Number:</label>
            <input type="text" name="contact" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="meter_code">Meter Code:</label>
            <input type="text" name="meter_code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Client</button>
    </form>
</div>
@endsection
