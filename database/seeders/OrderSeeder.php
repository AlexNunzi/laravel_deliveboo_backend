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
            [
                'order_date' => '2023-07-17 11:12:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2023-07-17 11:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana', 'Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-07-17 19:18:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe']
            ],
            [
                'order_date' => '2023-07-17 19:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-07-17 19:40:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana', 'Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-07-17 20:21:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe']
            ],
            [
                'order_date' => '2023-07-17 21:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-06-17 11:12:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2023-06-17 11:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana', 'Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-06-17 19:18:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe']
            ],
            [
                'order_date' => '2023-06-17 19:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-05-17 11:06:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana', 'Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-05-17 11:12:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2023-05-17 11:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana', 'Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-05-17 19:18:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe']
            ],
            [
                'order_date' => '2023-05-17 19:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-04-17 09:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana', 'Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-04-17 10:27:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana', 'Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-04-17 19:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti all\'Amatriciana', 'Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-03-17 09:27:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-03-17 11:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-02-17 11:27:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-02-17 11:45:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-02-17 12:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-02-17 13:40:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2023-01-17 11:45:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-01-17 12:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-01-17 13:40:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2023-01-17 13:55:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2023-01-17 14:22:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-12-17 11:10:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-12-17 11:27:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-12-17 12:10:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-12-17 13:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-12-17 14:22:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-11-17 11:22:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-11-17 11:52:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-11-17 11:58:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-11-17 12:08:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-11-17 13:18:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-11-17 14:29:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-10-17 11:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-10-17 12:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-10-17 13:22:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-10-17 14:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-09-17 12:22:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-09-17 13:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-09-17 14:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-08-17 11:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-08-17 11:28:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-08-17 12:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-08-17 19:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-07-17 11:10:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-07-17 11:27:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-07-17 12:10:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-07-17 13:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-07-17 14:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-06-17 12:10:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
            ],
            [
                'order_date' => '2022-06-17 13:22:13',
                'customer_name' => 'Brambilla Fumagalli',
                'customer_address' => 'Via Giovanni da Procida',
                'customer_email' => 'brambilla.fumagalli@hotmail.it',
                'customer_phone_number' => '3255610952',
                'status' => true,
                'foods' => ['Spaghetti alla carbonara']
            ],
            [
                'order_date' => '2022-06-17 14:22:13',
                'customer_name' => 'Ajeje Brazorf',
                'customer_address' => 'Via dal tram',
                'customer_email' => 'ajeje.brazorf@hotmail.it',
                'customer_phone_number' => '3335021586',
                'status' => true,
                'foods' => ['Spaghetti cacio e pepe', 'Spaghetti alla carbonara', 'Spaghetti all\'Amatriciana']
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
