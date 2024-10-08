<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Date;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TruyVanController extends Controller
{
    public function index(){
        // Câu 1:
        // $user = DB::table('users as u')->select('u.name', DB::raw('SUM(o.amount) as total_spent'))
        //             ->join('orders o', 'u.id', '=', 'o.user_id')
        //             ->groupBy('u.name')
        //             ->having('total_spent', '>', 1000)
        //             ->toRawSql();

        //             dd($user);

        // Câu 2:
        // $order = Order::select(DB::raw('DATE(order_date) as date'), DB::raw('COUNT(*) as order_account'), DB::raw('SUM(total_amount) as total_sales'))
        //             ->whereBetween('order_date', ['2024-01-01', '2024-09-30'])
        //             ->groupBy(DB::raw('DATE(order_date)'))
        //             ->toRawSql();

        //             dd($order);

        // Câu 3:
        // $product = DB::table('product p')
        //             ->select('product_name')
        //             ->whereNotExists(
        //                 DB::table('order o')
        //                     ->select(1)
        //                     ->where('o.product_id', '=', 'p.id')
        //             )->toRawSql();
        //     dd($product);

        // Câu 4:
        // $sale = DB::select(DB::raw('
        // WITH sale_ctes AS (
        //     SELECT product_id, SUM(quantity) AS total_sold
        //     FROM sales
        //     GROUP BY product_id
        // )
        // SELECT p.product_name, s.total_sold
        // FROM products p
        // JOIN sales_cte s ON p.id = s.product_id
        // WHERE s.total_sold > 100
        // '));

        // dd($sale);

        // Câu 5:

        // $user = User::select('users.name', 'products.product_name', 'orders.order_date')
        //             ->join('orders', 'users.id', '=', 'orders.users_id')
        //             ->join('order_items', 'orders.id', 'order_items.order_id')
        //             ->join('products', 'order_items.product_id', '=', 'products.id')
        //             ->whereRaw('order.order_date >= now() - INTERVAl 30 DAY')
        //             ->toRawSql();

        //             dd($user);

        // Câu 6:
        // $order = Order::select(
        //     DB::raw('DATE_FORMAT(orders.order_date), %Y-%m AS order_month'),
        //     DB::raw('SUM(order_items.quantity * order_items.price) AS total_revenue'))
        //     ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        //     ->where('orders.status', 'completed')
        //     ->groupBy('order_month')
        //     ->orderByDesc('order_month')
        //     ->toRawSql();

        //     dd($order);

        // Câu 7:
        // $product = DB::table('products')
        //             ->select('products.product_name')
        //             ->leftJoin('order_items', 'products.id', '=', 'order_items.product_id')
        //             ->whereNull('order_items.product_id')
        //             ->toRawSql();

        //             dd($product);

        // Câu 8:

        // $product = DB::table('products as p')
        //             ->select('p.category_id', 'p.product_name', DB::raw('MAX(oi.total) as max_revenue'))
        //             ->join(DB::raw('(SELECT product_id, SUM(quantity * price) AS total FROM order_items GROUP BY product_id) as oi'), 'p.id', '=', 'oi.product_id')
        //             ->groupBy('p.category_id', 'p.product_name')
        //             ->orderByDesc('max_revenue')
        //             ->toSql();

        //         dd($product);

        // Câu 9:
        // $order = Order::select('orders.id', 'users.name', 'orders.order_date', DB::raw('SUM(order_items.quantity * order_items.price) as total_vale'))
        //             ->join('users', 'users.id', '=', 'orders.user_id')
        //             ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        //             ->groupBy('orders.id', 'users.name', 'orders.order_date')
        //             ->having('total_value', '>', (DB::raw('SELECT AVG(total) FROM (SELECT SUM(quantity * price) as total FROM order_items GROUP BY order_id) as avg_order_value')))
        //             ->toRawSql();

        //             dd($order);

        // Câu 10:
        // $product = DB::table('product as p')
        //             ->select('p.category_id', 'p.product_name', DB::raw('SUM(oi.quantity) AS total_sold'))
        //             ->join('order_items as oi', 'p.id', '=', 'oi.product_id')
        //             ->groupBy('p.category_id', 'p.product_name')
        //             ->having('total_amount', '=',
        //                 DB::raw('(SELECT MAX(sub.total_sold) FROM (SELECT product_name, SUM(quantity) as total_sold) FROM order_items JOIN products ON order_items.product_id = products.id WHERE products.category_id = p.category_id GROUP BY product_name) as sub'))
        //             ->toRawSql();


        //             dd($product);

        return view('hello');
    }
}
