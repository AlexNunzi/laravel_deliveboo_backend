<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Decimal;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::user()->id)->first();

        $orders = Order::with('food')->whereHas('food', function (Builder $query) use ($restaurants) {
            $query->where('restaurant_id', $restaurants->id);
        })->orderBy('order_date', 'desc')->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Api\OrderRequest  $request
     * @param  \Ramsey\Uuid\Type\Decimal  $totalPrice
     * @return \App\Models\Order
     */
    public function store(OrderRequest $request, Decimal $totalPrice)
    {
        $orderInformation = [
            'customer_name' => $request->customer_name,
            'customer_phone_number' => $request->customer_phone_number,
            'customer_address' => $request->customer_address,
            'customer_email' => $request->customer_email,
            'order_date' => date("Y-m-d H:i:s"),
            'total_price' => $totalPrice
        ];

        $newOrder = new Order();

        $newOrder->fill($orderInformation);
        $newOrder->status = true;
        $newOrder->save();

        foreach ($request->foods_info as $food) {
            $newOrder->food()->attach($food['id'], ['quantity' => $food['quantity']]);
        }

        return $newOrder;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
