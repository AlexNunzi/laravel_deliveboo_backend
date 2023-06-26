<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Braintree\Gateway;

class BraintreeController extends Controller
{
    public function generateToken(Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'token' => $token,
            'success' => true
        ];

        return response()->json($data);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {

        $food_ids = [];

        foreach ($request->food_ids as $food) {
            $food_ids[] = $food['id'];
        }

        $foods = Food::whereIn('id', $food_ids)->get();

        $totalPrice = null;

        foreach ($foods as $food) {
            $quantity = null;
            foreach ($request->food_ids as $singleFood) {
                if ($singleFood['id'] == $food->id) {
                    $quantity = $singleFood['quantity'];
                }
            }
            $price = $food->price * $quantity;
            $totalPrice += $price;
        }

        $result = $gateway->transaction()->sale([
            'amount' => $totalPrice,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $orderInformation = [
            'customer_name' => $request->customer_name,
            'customer_phone_number' => $request->customer_phone_number,
            'customer_address' => $request->customer_address,
            'customer_email' => $request->customer_email,
            'order_date' => date("Y-m-d H:i:s"),
            'total_price' => $totalPrice
        ];

        $order = new Order();

        $order->fill($orderInformation);

        if ($result->success) {
            $data = [
                'message' => 'Transazione eseguita',
                'success' => true
            ];
            $order->status = true;
            $order->save();
            return response()->json($data);
        } else {
            $data = [
                'message' => 'Transazione fallita',
                'success' => false
            ];
            $order->status = false;
            $order->save();
            return response()->json($data);
        }
    }
}
