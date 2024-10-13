<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Repositories\ClientRepository;


class ExpenseChart
{
    protected $chart;
    protected $clientRepository;
    public function __construct(LarapexChart $chart, ClientRepository $clientRepository, )
    {
        $this->chart = $chart;
        $this->clientRepository = $clientRepository;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $clients = $this->clientRepository->all();

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
            ->setTitle('Sales and Income during ' . now()->year)
            ->addData('Sales', $salesData)       // Add sales data
            ->addData('Income', $incomeData)     // Add income data
            ->setXAxis(array_slice($months, 0, $currentMonth));
    }
}
