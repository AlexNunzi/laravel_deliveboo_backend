<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userMario = User::where('name', 'Mario Rossi')->first();
        $userLuca = User::where('name', 'Luca Bianchi')->first();
        $userPaola = User::where('name', 'Paola Verdi')->first();

        $restaurants = [
            [
                'name' => 'Osteria da Mario',
                'user_id' => $userMario->id,
                'address' => 'Via Antonio Cantore 15',
                'image' => 'img/mX9RQuvwwC1KOxfYbxgyvAFotT7SuEuNHayFtPir.jpg',
                'p_iva' => '08100750010',
                'description' => 'Voglia di cucina italiana? Ordina dalla nostra osteria e grazie a DeliveBoo ricevi l\'ordine dove vuoi tu!',
            ],
            [
                'name' => 'Le delizie di nonno Luca',
                'user_id' => $userLuca->id,
                'address' => 'Via Vezzani 21',
                'image' => 'img/aWxPRraHsTVi4cl3OVStW8yndQrnlapB5Gnx63Qp.jpg',
                'p_iva' => '60519704519',
                'description' => 'Stai cercando cucina italiana a domicilio? Grazie alle delizie di nonno Luca non hai più bisogno di cercare. Vai al suo menù su DeliveBoo e fai il tuo ordine ora!',
            ],
            [
                'name' => 'McBoo',
                'user_id' => $userPaola->id,
                'address' => 'Via Cornigliano 101',
                'image' => 'img/oy1z9TEP0ef5FX9vRz8NPJ2sqJVOuEik709lJ5az.jpg',
                'p_iva' => '71093710693',
                'description' => 'Stai cercando hamburger o fritti a domicilio? Con McBoo non hai più bisogno di cercare. Dai un\'occhiata al nostro menù su DeliveBoo e scegli le prelibatezze che preferisci!',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->image = $restaurant['image'];
            $newRestaurant->p_iva = $restaurant['p_iva'];
            $newRestaurant->description = $restaurant['description'];
            $newRestaurant->slug = Food::generateSlug($newRestaurant->name);

            $newRestaurant->save();
        }
    }
}
