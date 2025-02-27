<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Service\Order\OrderServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    private $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Display statistics including revenue, number of products, customers, and orders.
     */
    public function index(Request $request)
    {
        // Calculate statistics
        $totalRevenue = $this->calculateTotalRevenue();
        $productCount = Product::count();
        $customerCount = User::count();
        $orderCount = Order::count();

        // Prepare chart data (for revenue over the past 7 days, for example)
        $chartData = $this->getRevenueChartData();

        return view('admin.statistic.index', [
            'totalRevenue' => $totalRevenue,
            'productCount' => $productCount,
            'customerCount' => $customerCount,
            'orderCount' => $orderCount,
            'chartData' => $chartData,
        ]);
    }

    /**
     * Calculate the total revenue from completed orders.
     */
    /**
     * Calculate the total revenue from completed orders.
     */
    private function calculateTotalRevenue()
    {
        return DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->sum('order_details.total');
    }


    /**
     * Get revenue data for a chart (for the past 7 days).
     */
    private function getRevenueChartData()
    {
        // Get total revenue for the past 7 days from the order_details table
        $revenueData = DB::table('order_details')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->where('orders.created_at', '>=', now()->subDays(7))
            ->groupBy(\DB::raw('DATE(orders.created_at)'))
            ->select(\DB::raw('DATE(orders.created_at) as date'), \DB::raw('SUM(order_details.total) as revenue'))
            ->get();

        $chartData = [
            'labels' => $revenueData->pluck('date'),
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => $revenueData->pluck('revenue'),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1,
                ]
            ]
        ];

        return $chartData;
    }
}
