<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            [
                'order_date' => '2023-06-17 09:27:13',
                'customer_name' => 'Paolo Bianchi',
                'customer_address' => 'Corso Italia 15',
                'customer_email' => 'paolo.bianchi@hotmail.it',
                'customer_phone_number' => '3335670987',
                'status' => true,
                'foods' => ['Bacon burger', 'Medaglioni di pollo impanati', 'Patatine fritte']
            ],
            [
                'order_date' => '2023-06-17 09:27:13',
                'customer_name' => 'Giorgio Ne',
                'customer_address' => 'Corso Roma 15',
                'customer_email' => 'giorgio.ne@hotmail.it',
                'customer_phone_number' => '3205650987',
                'status' => true,
                'foods' => ['Lasagne al ragù', 'Pizza con tartare di dentice e pomodoro datterino']
            ],
            [
                'order_date' => '2023-06-17 09:27:13',
                'customer_name' => 'Michela Boh',
                'customer_address' => 'Via Garibaldi 15',
                'customer_email' => 'michela.boh@hotmail.it',
                'customer_phone_number' => '3455670103',
                'status' => false,
                'foods' => ['Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2023-06-17 09:27:13',
                'customer_name' => 'Michela Boh',
                'customer_address' => 'Via Garibaldi 15',
                'customer_email' => 'michela.boh@hotmail.it',
                'customer_phone_number' => '3455670103',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana']
            ],
        ];

        foreach ($orders as $order) {
            $newOrder = new Order();

            $newOrder->order_date = $order['order_date'];
            $newOrder->customer_name = $order['customer_name'];
            $newOrder->customer_address = $order['customer_address'];
            $newOrder->customer_email = $order['customer_email'];
            $newOrder->customer_phone_number = $order['customer_phone_number'];
            $newOrder->status = $order['status'];

            $order_price = 0;

            $newOrder->total_price = $order_price;
            $newOrder->save();


            foreach ($order['foods'] as $food) {
                // Recupero il riferimento al model Food dal database
                $foodAttach = Food::where('name', $food)->first();

                $order_price += $foodAttach->price;

                // E genero il riferimento nella tabella ponte con $newOrder
                $newOrder->food()->attach($foodAttach, ['quantity' => 1]);
            }

            $newOrder->total_price = $order_price;
            $newOrder->update();
        }
    }
}
