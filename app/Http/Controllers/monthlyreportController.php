<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Billing; // Ensure you have a Billing model
use Carbon\Carbon;

class monthlyreportController extends Controller
{
    /**
     * Generate a monthly billing report.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
   public function monthlyreport(Request $request)
{
    $month = $request->input('month', Carbon::now()->format('Y-m'));

    $startDate = Carbon::parse($month)->startOfMonth();
    $endDate = Carbon::parse($month)->endOfMonth();

    $billings = billing::whereBetween('reading_date', [$startDate, $endDate])->get();

    $totalRevenue = $billings->sum('amount');
    $paidCount = $billings->where('status', 'Paid')->count();
    $unpaidCount = $billings->where('status', 'Unpaid')->count();

    return view('monthly_report', [
        'billings' => $billings,
        'month' => $month,
        'totalRevenue' => $totalRevenue,
        'paidCount' => $paidCount,
        'unpaidCount' => $unpaidCount,
    ]);
}

public function generateMonthlyReport(Request $request)
{
    $validatedData = $request->validate([
        'month' => 'required|date_format:Y-m', // Ensures the month is in correct format
    ]);

    $selectedMonth = $validatedData['month'];

    // Filter billings for the selected month
    $billings = Billing::with('client')
        ->whereYear('reading_date', '=', substr($selectedMonth, 0, 4))
        ->whereMonth('reading_date', '=', substr($selectedMonth, 5, 2))
        ->get();

    // Calculate Total Revenue
    $totalRevenue = $billings->sum('total');

    // Count Paid and Unpaid Bills
    $paidCount = $billings->where('status', 1)->count();
    $unpaidCount = $billings->where('status', 0)->count();

    // Pass data to the view
    return view('monthly_report', compact('billings', 'totalRevenue', 'paidCount', 'unpaidCount'));
}


}
