<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TblCarrentailorder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        // Initialize default values
        $months = [];
        $orders = [];
        $revenue = [];
        $totalOrders = 0;
        $totalRevenue = 0;

        // Get orders for the last 12 months
        $orderStats = TblCarrentailorder::select(
            DB::raw('DATE_FORMAT(OrderDate, "%Y-%m") as month'),
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('COALESCE(SUM(Payment), 0) as total_revenue')
        )
            ->where('OrderDate', '>=', Carbon::now()->subMonths(12))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        if ($orderStats->isNotEmpty()) {
            // Format data for ApexCharts
            $months = $orderStats->pluck('month')->map(function($month) {
                return Carbon::createFromFormat('Y-m', $month)->format('M Y');
            })->toArray();
            
            $orders = $orderStats->pluck('total_orders')->toArray();
            $revenue = $orderStats->pluck('total_revenue')->toArray();

            // Get total stats
            $totalOrders = array_sum($orders);
            $totalRevenue = array_sum($revenue);
        }

        // Get overall totals (including orders outside the 12-month window)
        $overallStats = TblCarrentailorder::select(
            DB::raw('COUNT(*) as total_orders'),
            DB::raw('COALESCE(SUM(Payment), 0) as total_revenue')
        )->first();

        $totalOrders = $overallStats->total_orders;
        $totalRevenue = $overallStats->total_revenue;

        return view('admin.home', compact('months', 'orders', 'revenue', 'totalOrders', 'totalRevenue'));
    }
}
