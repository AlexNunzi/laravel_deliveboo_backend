<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;
use App\Mail\FeedbackToCustomer;
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

        $food_ids = array_unique($food_ids);

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
        $order->status = true;
        $order->save();

        $mailContent = [];

        foreach ($request->food_ids as $food) {
            $order->food()->attach($food['id'], ['quantity' => $food['quantity']]);
            $mailContent[] = [
                'name' => $food['name'],
                'price' => $food['price'],
                'quantity' => $food['quantity']
            ];
        }

        if ($result->success) {
            $data = [
                'message' => 'Transazione eseguita',
                'success' => true
            ];
            $oggettoNewContact = new NewContact($order, $mailContent);
            $castomerNew = new FeedbackToCustomer($order, $mailContent);


            Mail::to('giuliadai1508@gmail.com')->send($oggettoNewContact);
            Mail::to($request->customer_email)->send($castomerNew);

            return response()->json(
                [
                    'success' => true
                ]
            );

            $order->status = true;
            $order->update();
            return response()->json($data);
        } else {
            $data = [
                'message' => 'Transazione fallita',
                'success' => false
            ];
            $order->status = false;
            $order->update();
            return response()->json($data);
        }
    }
}
