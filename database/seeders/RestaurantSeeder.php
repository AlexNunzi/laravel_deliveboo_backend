<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
                'image' => 'mX9RQuvwwC1KOxfYbxgyvAFotT7SuEuNHayFtPir.jpg',
                'p_iva' => '08100750010',
                'description' => 'Voglia di cucina italiana? Ordina dalla nostra osteria e grazie a DeliveBoo ricevi l\'ordine dove vuoi tu!',
                'type' => ['Italiano']
            ],
            [
                'name' => 'Le delizie di nonno Luca',
                'user_id' => $userLuca->id,
                'address' => 'Via Vezzani 21',
                'image' => 'aWxPRraHsTVi4cl3OVStW8yndQrnlapB5Gnx63Qp.jpg',
                'p_iva' => '60519704519',
                'description' => 'Stai cercando cucina italiana a domicilio? Grazie alle delizie di nonno Luca non hai più bisogno di cercare. Vai al suo menù su DeliveBoo e fai il tuo ordine ora!',
                'type' => ['Pizzeria', 'Italiano']
            ],
            [
                'name' => 'McBoo',
                'user_id' => $userPaola->id,
                'address' => 'Via Cornigliano 101',
                'image' => 'oy1z9TEP0ef5FX9vRz8NPJ2sqJVOuEik709lJ5az.jpg',
                'p_iva' => '71093710693',
                'description' => 'Stai cercando hamburger o fritti a domicilio? Con McBoo non hai più bisogno di cercare. Dai un\'occhiata al nostro menù su DeliveBoo e scegli le prelibatezze che preferisci!',
                'type' => ['Fast-Food']
            ],
        ];

        // Controllo se la cartella image nello storage è presente
        // storage/app/public/image
        if (!file_exists(storage::path('image'))) {

            // Se non esiste la creo
            File::makeDirectory(storage::path('image'));
        }

        foreach ($restaurants as $restaurant) {

            // Per ogni restaurant copio l'immagine contenuta all'interno di public/img/{nome immagine}
            // e la incollo all'interno della cartella storage/app/public/image
            File::copy(
                public_path('img/' . $restaurant['image']),
                storage::path('image/' . $restaurant['image'])
            );


            $newRestaurant = new Restaurant();
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->user_id = $restaurant['user_id'];
            $newRestaurant->address = $restaurant['address'];
            $newRestaurant->image = 'image/' . $restaurant['image'];
            $newRestaurant->p_iva = $restaurant['p_iva'];
            $newRestaurant->description = $restaurant['description'];
            $newRestaurant->slug = Food::generateSlug($newRestaurant->name);

            $newRestaurant->save();

            foreach ($restaurant['type'] as $type) {

                // Recupero il riferimento al model Type dal database
                $typeAttach = Type::where('name', $type)->first();

                // E genero il riferimento nella tabella ponte con $newRestaurant
                $newRestaurant->types()->attach($typeAttach);
            }
        }
    }
}
