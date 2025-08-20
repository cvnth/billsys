@extends('layouts.app')

@section('title', 'billings')

@section('content')
<h1 class="h3 mb-0 text-gray-800">List of Billings</h1>
    <br></br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Client Id</th>
                <th>Reading Date</th>
                <th>Client</th>
                <th>Amount</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($billings as $billing)
                <tr>
                    <td>@if($billing->client)
                            {{ $billing->client->client_id }}
                        @else
                            <span class="text-danger">Not found</span>
                        @endif</td>
                    <td>{{ $billing->reading_date }}</td> 
                    <td>
                        @if($billing->client)
                            {{ $billing->client->firstname }} {{ $billing->client->lastname }}
                        @else
                            <span class="text-danger">Not found</span>
                        @endif
                    </td> 
                    <td>
                        {{ number_format($billing->total, 2) }}           
                    </td>
                    <td>{{ $billing->due_date }}</td> 
                    <td>
                        @if($billing->status == 1)
                            <span class="badge bg-success">Paid</span>
                        @else
                            <span class="badge bg-warning">Pending</span>
                        @endif
                    </td> 
                    <td>
                    <a href="{{ route('billings.show', $billing->id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('edit_billing', $billing->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('billings.destroy', $billing->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this billing?')">Delete</button>
                        </form>
                    </td> 
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
