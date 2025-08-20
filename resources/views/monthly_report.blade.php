@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="h3 mb-0 text-gray-800">Water Billing Monthly Report</h2>
    <br>
    <form action="{{ route('monthlyreport.monthly_report') }}" method="POST">
        @csrf
        <label for="month" style="font-weight: bold; color: #5a5c69 !important; margin-left: 2.9%;">Select Month:</label>
        <input type="month" id="month" name="month" required>
        <br><br>
        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Generate</button>
        <br><br>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if($billings->isNotEmpty())
            <div id="report-content">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card-a">
                            <div class="card-body">
                                <h5>Total Revenue</h5>
                                <p>P{{ number_format($totalRevenue, 2) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-a">
                            <div class="card-body">
                                <h5>Paid Bills</h5>
                                <p>{{ $paidCount }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-a">
                            <div class="card-body">
                                <h5>Unpaid/Pending Bills</h5>
                                <p>{{ $unpaidCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Reading Date</th>
                                <th>Amount</th>
                                <th>Due Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($billings as $billing)
                                <tr>
                                    <td>{{ optional($billing->client)->firstname . ' ' . optional($billing->client)->lastname ?? 'Unknown Client' }}</td>
                                    <td>{{ $billing->reading_date ? \Carbon\Carbon::parse($billing->reading_date)->format('Y-m-d') : 'N/A' }}</td>
                                    <td>{{ number_format($billing->total, 2) }}</td>
                                    <td>{{ $billing->due_date ? \Carbon\Carbon::parse($billing->due_date)->format('Y-m-d') : 'N/A' }}</td>
                                    <td>{{ $billing->status == 1 ? 'Paid' : 'Pending' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Print Button -->
            <button type="button" class="btn btn-secondary mt-3" onclick="printReport()">Print Report</button>
        @else
            <p class="text-center">No data available for the selected month.</p>
        @endif
    </form>
</div>

<script>
    function printReport() {
        // Get the content of the report
        const reportContent = document.getElementById('report-content').innerHTML;

        // Open a new window for printing
        const printWindow = window.open('', '_blank', 'width=800,height=600');
        
        // Write the report content into the new window
        printWindow.document.open();
        printWindow.document.write(`
            <html>
            <head>
                <title>Monthly Report</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f4f4f4;
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <h2>Water Billing Monthly Report</h2>
                ${reportContent}
            </body>
            </html>
        `);
        printWindow.document.close();

        // Trigger the print dialog
        printWindow.print();

        // Close the print window after printing
        printWindow.onafterprint = () => printWindow.close();
    }
</script>

@endsection
