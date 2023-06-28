<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function index()
    {
        $restaurant = Restaurant::select('id')->where('user_id', Auth::id())->first();

        $date = new DateTime();
        $lastDay = $date->format('Y-m-t');
        $dateMinus12 = $date->modify('-11 months')->format('Y-m-01');

        $ordersRevenue = Order::with('food')->whereHas('food', function (Builder $query) use ($restaurant) {
            $query->where('restaurant_id', $restaurant->id);
        })->whereBetween('order_date', [$dateMinus12, $lastDay])
            ->selectRaw("SUM(total_price) AS total")
            ->selectRaw("DATE_FORMAT(order_date, '%Y-%m') AS date")
            ->groupby("date")
            ->orderBy("date", "DESC")->get();

        $ordersCount = Order::with('food')->whereHas('food', function (Builder $query) use ($restaurant) {
            $query->where('restaurant_id', $restaurant->id);
        })->whereBetween('order_date', [$dateMinus12, $lastDay])
            ->selectRaw("COUNT(id) AS orderTotal")
            ->selectRaw("DATE_FORMAT(order_date, '%Y-%m') AS date")
            ->groupby("date")
            ->orderBy("date", "DESC")->get();

        // $ordersRevenue = Order::where('id', $restaurants_id)
        //     ->whereBetween('created_at', [$dateMinus12, $lastDay])
        //     ->selectRaw("SUM(total_price) AS total")
        //     ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS date")
        //     ->groupby("date")
        //     ->orderBy("date", "DESC")
        //     ->get();

        // $ordersCount = Order::where('id', $restaurants_id)
        //     ->whereBetween('created_at', [$dateMinus12, $lastDay])
        //     ->selectRaw("COUNT(id) AS orderTotal")
        //     ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS date")
        //     ->groupby("date")
        //     ->orderBy("date", "DESC")
        //     ->get();

        return view('admin.dashboard', compact('ordersRevenue', 'ordersCount', 'restaurant'));
    }
}
