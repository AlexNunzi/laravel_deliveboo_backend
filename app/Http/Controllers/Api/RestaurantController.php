<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {

        $param_ids = $request->input('type_id');

        $restaurants = Restaurant::whereHas('types', function ($query) use ($param_ids) {
            $query->whereIn('types.id', $param_ids);
        })->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}
