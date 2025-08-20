@extends('layouts.app')

@section('title', 'Billing Receipt')

@section('content')

<div class="container mt-4">
    <div class="card p-3 shadow-sm" style="max-width: 600px; margin: 0 auto;">
        <div class="text-center mb-3">
            <h4 class="text-uppercase font-weight-bold text-dark mb-1">Billing Receipt</h4>
            <p class="text-muted" style="font-size: 0.9rem;">Date: {{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
        </div>

        <div class="mb-3">
            <h6 class="text-dark"><strong>Client Information</strong></h6>
            <hr class="mt-1 mb-2">
            <p style="font-size: 0.9rem;"><strong>Name:</strong> {{ $billing->client->firstname }} {{ $billing->client->lastname }}</p>
            <p style="font-size: 0.9rem;"><strong>Client ID:</strong> {{ $billing->client->client_id }}</p>
        </div>

        <div class="mb-3">
            <h6 class="text-dark"><strong>Billing Details</strong></h6>
            <hr class="mt-1 mb-2">
            <p style="font-size: 0.9rem;"><strong>Billing Date:</strong> {{ \Carbon\Carbon::parse($billing->reading_date)->format('F d, Y') }}</p>
            <p style="font-size: 0.9rem;"><strong>Due Date:</strong> {{ \Carbon\Carbon::parse($billing->due_date)->format('F d, Y') }}</p>
            <p style="font-size: 0.9rem;"><strong>Current Reading:</strong> {{ $billing->reading }} cubic meters</p>
            <p style="font-size: 0.9rem;"><strong>Rate:</strong> ₱{{ number_format($billing->rate, 2) }} per cubic meter</p>
            <p style="font-size: 0.9rem;"><strong>Total Consumption:</strong> {{ $billing->reading - $billing->previous }} cubic meters</p>
            <p style="font-size: 0.9rem;"><strong>Total Amount:</strong> <span class="text-success font-weight-bold">₱{{ number_format($billing->total, 2) }}</span></p>
            <p style="font-size: 0.9rem;"><strong>Status:</strong> 
                <span class="{{ $billing->status == 'Paid' ? 'text-success' : 'text-danger' }}">
                    {{ $billing->status_text }}
                </span>
            </p>
        </div>

        <div class="text-center mt-3">
            <button onclick="window.print()" class="btn btn-primary btn-sm">
                Print Receipt
            </button>
        </div>
    </div>
</div>

<style>
    .card {
        background-color: #c1d3f3;
        border: 1px solid #b4b6bf;
    }
    .card p {
        margin: 0;
        padding: 2px 0;
    }
    .card h6 {
        margin-bottom: 5px;
    }

    /* Print Styles */
    @media print {
        body {
            background: white;
            color: black;
        }
        .btn, .navbar, .sidebar, .footer, .topbar {
            display: none !important;
        }
        .card {
            border: none;
            box-shadow: none;
        }
        .container {
            margin: 0;
            padding: 0;
        }
    }
</style>


<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
@endsection
