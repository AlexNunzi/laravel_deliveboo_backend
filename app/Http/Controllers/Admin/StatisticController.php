<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order as ModelsOrder;
use App\Models\Restaurant as ModelsRestaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $restaurant = ModelsRestaurant::select('id')->where('user_id', Auth::id())->first();
        $restaurants_id = $restaurant->id;

        $date = new DateTime();
        $lastDay = $date->format('Y-m-t');
        $dateMinus12 = $date->modify('-11 months')->format('Y-m-01');

        $ordersRevenue = ModelsOrder::where('id', $restaurants_id)
            ->whereBetween('created_at', [$dateMinus12, $lastDay])
            ->selectRaw("SUM(total_price) AS total")
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS date")
            ->groupby("date")
            ->orderBy("date", "DESC")
            ->get();

        $ordersCount = ModelsOrder::where('id', $restaurants_id)
            ->whereBetween('created_at', [$dateMinus12, $lastDay])
            ->selectRaw("COUNT(id) AS orderTotal")
            ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') AS date")
            ->groupby("date")
            ->orderBy("date", "DESC")
            ->get();

        return view('admin.statistics.index', compact('ordersRevenue', 'ordersCount', 'restaurant'));
    }
}
