<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\Financial_Report;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Taxe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Bai2Controller extends Controller
{
    public function index(){
        // Câu 1: Tính tổng doanh thu theo tháng

        $sales = Sale::select(
            DB::raw('SUM(total) as total_sales'),
            DB::raw('EXTRACT(MONTH FROM sale_date) as month'),
            DB::raw('EXTRACT(YEAR FROM sale_date) as year')
        )->groupBy(
            DB::raw('EXTRACT(MONTH FROM sale_date)'),
            DB::raw('EXTRACT(YEAR FROM sale_date)')
        )->get();


        // Câu 2: Tổng chi phí theo tháng
        $expenses = Expenses::select(
            DB::raw('SUM(amount) as total_expenses'),
            DB::raw('EXTRACT(MONTH FROM expense_date) as month'),
            DB::raw('EXTRACT(YEAR FROM expense_date) as year')
        )
        ->groupBy(
            DB::raw('EXTRACT(MONTH FROM expense_date)'),
            DB::raw('EXTRACT(YEAR FROM expense_date)')
        )->get();

        // Câu 3: Báo cáo tài chính 1 tháng
        $total_sales = Sale::whereMonth('sale_date', 9)
                            ->whereYear('sale_date', 2024)
                            ->sum('total');

        $total_expenses = Expenses::whereMonth('expense_date', 9)
        ->whereYear('expense_date', 2024)
        ->sum('amount');

        $profit_before_tax = $total_sales - $total_expenses;

        $tax_rate = Taxe::where('tax_name', 'VAT')->value('rate');

        $tax_amount = $total_sales * ($tax_rate / 100);

        $profit_after_tax = $profit_before_tax - $tax_amount;

        $financial_reports = Financial_Report::create([
            'month' => 9,
            'year' => 2024,
            'total_sales' => $total_sales,
            'total_expense' => $total_expenses,
            'profit_before_tax' => $profit_before_tax,
            'tax_amount' => $tax_amount,
            'profit_after_tax'=> $profit_after_tax,
        ]);

        return view('hello', compact('sales', 'expenses'));
    }
}
