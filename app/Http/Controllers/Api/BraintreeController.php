<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\OrderRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;
use App\Mail\FeedbackToCustomer;
use App\Models\Order;
use Braintree\Gateway;
use Exception;

/**
 * Generate BrainTree client token 
 *
 * @param  \Braintree\Gateway  $gateway
 * @return \Illuminate\Http\Response
 */
class BraintreeController extends Controller
{
    public function generateToken(Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'token' => $token
        ];

        return response()->json($data);
    }

    /**
     * Send payment request to BrainTree, store order information and send
     * feedback mails  to customer and restaurateur
     *
     * @param  \App\Http\Requests\Api\OrderRequest  $request
     * @param  \Braintree\Gateway  $gateway
     * @param  \App\Http\Controllers\Admin\OrderController  $orderController
     * @param  \App\Http\Controllers\Admin\RestaurantController  $restaurantController
     * @return \Illuminate\Http\Response
     */
    public function makePayment(OrderRequest $request, Gateway $gateway, OrderController $orderController, RestaurantController $restaurantController)
    {
        $totalPrice = $this->calcTotalFoodPrice($request, $restaurantController);

        $transaction = $gateway->transaction()->sale([
            'amount' => $totalPrice,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $newOrder = $orderController->store($request, $totalPrice);

        if ($transaction->success) {
            $data = [
                'message' => 'Transazione eseguita'
            ];

            $this->sendCustomerAndRestaurantMail($newOrder, $request);

            return response()->json($data);
        } else {
            $data = [
                'message' => 'Transazione fallita'
            ];
            $httpStatusCode = 402;
            $newOrder->status = false;
            $newOrder->update();
            return response()->json($data, $httpStatusCode);
        }
    }

    /**
     * Calculates the total price of an OrderRequest
     *
     * @param  \App\Http\Requests\Api\OrderRequest  $request
     * @param  \App\Http\Controllers\Admin\RestaurantController  $restaurantController
     * @return \Ramsey\Uuid\Type\Decimal
     */
    private function calcTotalFoodPrice(OrderRequest $request, RestaurantController $restaurantController)
    {
        $foods = $restaurantController->getDbFoods($request->foods_info);

        if (count($foods) > 0) {
            $totalPrice = null;

            foreach ($foods as $food) {
                $quantity = null;
                foreach ($request->foods_info as $singleFood) {
                    if ($singleFood['id'] == $food->id) {
                        $quantity = $singleFood['quantity'];
                    }
                }
                $price = $food->price * $quantity;
                $totalPrice += $price;
            }
            return $totalPrice;
        }
        throw new Exception('Impossible to find foods associated with entered ids.');
    }

    /**
     * Send order information emails to customer and restaurateur
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Http\Requests\Api\OrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    private function sendCustomerAndRestaurantMail(Order $order, OrderRequest $request)
    {
        $mailContent = [];

        foreach ($request->foods_info as $food) {
            $mailContent[] = [
                'name' => $food['name'],
                'price' => $food['price'],
                'quantity' => $food['quantity']
            ];
        }

        $oggettoNewContact = new NewContact($order, $mailContent);
        $castomerNew = new FeedbackToCustomer($order, $mailContent);

        Mail::to('alex.nunzi@hotmail.it')->send($oggettoNewContact);
        Mail::to($request->customer_email)->send($castomerNew);
    }
}
