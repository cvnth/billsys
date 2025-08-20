@extends('layouts.app')

@section('title', 'Clients')

@section('content')


<h1 class="h3 mb-0 text-gray-800">List of Clients</h1> 
<br></br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Client Id</th>
                <th>Date Created</th>
                <th>Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->client_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($client->date_created)->format('d-m-Y') }}</td>
                    <td>{{ $client->firstname }} {{ $client->middlename }} {{ $client->lastname }}</td>
                    <td>{{ $client->status == 1 ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
