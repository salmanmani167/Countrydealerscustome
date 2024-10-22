<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Repositories\purchase\PurchaseRepository;
class Purchase
{
    protected $chart;
    protected $purchaseRepository;
    public function __construct(LarapexChart $chart , PurchaseRepository $purchaseRepository)
    {
        $this->chart = $chart;
        $this->purchaseRepository = $purchaseRepository;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $clients = $this->purchaseRepository->all();

        // Initialize sales and income data arrays
        $salesData = [];
        $incomeData = [];

        // Get current year and month
        $currentMonth = now()->month;

        // Define an array of month names for the X-axis
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Loop through each month until the current month
        for ($month = 1; $month <= $currentMonth; $month++) {
            // Filter clients by the specific month
            $monthlySales = $clients->filter(function ($client) use ($month) {
                return \Carbon\Carbon::parse($client->created_at)->month == $month;
            });

            // Count the number of sales for that month
            $salesData[] = $monthlySales->count();

            // Calculate the total income for that month
            $incomeData[] = $monthlySales->sum('plot_sale_price');
        }

        // Build the chart
        return $this->chart->lineChart()
            ->setTitle('Purchases during ' . now()->year)
            ->addData('Purchases', $salesData)       // Add sales data
            ->addData('Expense', $incomeData)     // Add income data
            ->setXAxis(array_slice($months, 0, $currentMonth));
    }
}
