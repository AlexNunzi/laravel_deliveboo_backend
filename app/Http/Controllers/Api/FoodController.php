<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index($id) {
        $foods = Food::where('restaurant_id',$id)->get();
        return response()->json([
            'success' => true,
            'results' => $foods
        ]);

    }
}
