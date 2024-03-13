<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;

class FoodController extends Controller
{
    public function index($slug)
    {
        $foods = DB::table('restaurants')
            ->select('*')
            ->join('food', 'restaurant_id', '=', 'restaurants.id')
            ->where('restaurants.slug', '=', $slug)
            ->where('food.visibility', '=', 1)
            ->get();

        $restaurant = Restaurant::where("slug", $slug)->first();

        return response()->json([
            'results' => [
                "restaurant" => $restaurant,
                "foods" => $foods
            ]
        ]);
    }
}
