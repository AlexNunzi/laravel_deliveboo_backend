<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;

class FoodController extends Controller
{
    public function index($slug) {

        $restaurant = Restaurant::where("slug", $slug)->with("food")->first();

        return response()->json([
            'success' => true,
            'results' => $restaurant
        ]);
    }
}
