<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {

        $param_ids = $request->input('type_id');

        $restaurants = Restaurant::with('types')->withCount('food')->whereHas('types', function (Builder $query) use ($param_ids) {
            $query->whereIn('types.id', $param_ids)
                ->groupBy('restaurant_id')
                ->select('restaurant_id')
                ->havingRaw('COUNT(DISTINCT types.id) = ' . count($param_ids));
        })->having('food_count', '>', 0)->get();

        return response()->json([
            'results' => $restaurants
        ]);
    }
}
