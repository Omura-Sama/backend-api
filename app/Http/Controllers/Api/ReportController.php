<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Booking;
use App\Models\Invoice;
use App\Models\Expense;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function dashboardSummary(Request $request)
    {
        // Simple Dashboard Statistics for current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $totalBookings = Booking::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $totalOrders = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();

        $revenue = Invoice::whereBetween('issue_date', [$startOfMonth, $endOfMonth])->sum('paid_amount');
        $expenses = Expense::whereBetween('expense_date', [$startOfMonth, $endOfMonth])->sum('amount');

        return response()->json([
            'period' => [
                'start' => $startOfMonth->toDateString(),
                'end' => $endOfMonth->toDateString()
            ],
            'metrics' => [
                'total_bookings' => $totalBookings,
                'total_orders' => $totalOrders,
                'conversion_rate' => $totalBookings > 0 ? round(($totalOrders / $totalBookings) * 100, 2) : 0,
                'revenue' => $revenue,
                'expenses' => $expenses,
                'net_profit' => $revenue - $expenses
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
