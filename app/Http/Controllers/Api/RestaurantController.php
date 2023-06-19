<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index($typeId)
    {
        $restaurants = Restaurant::whereHas('types', function ($query) use ($typeId) {
            $query->where('types.id', $typeId);
        })->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}
