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
        $userBan = User::where('name', 'Ban Zhao')->first();
        $userHaruna = User::where('name', 'Haruna Esposito')->first();
        $userPablo = User::where('name', 'Pablo Costa')->first();
        $userMukki = User::where('name', 'Mukki Kumar')->first();
        $userRaj = User::where('name', 'Raj Gandhi')->first();
        $userChao = User::where('name', 'Chao de Santis')->first();
        $userMarcello = User::where('name', 'Marcello Lippi')->first();
        $userLuigi = User::where('name', 'Luigi Vitale')->first();
        $userBruce = User::where('name', 'Bruce Lee')->first();
        $userFranca = User::where('name', 'Franca Franchi')->first();
        $userFrancesco = User::where('name', 'Francesco Capuozzo')->first();

        $restaurants = [
            [
                'name' => 'Osteria da Mario',
                'user_id' => $userMario->id,
                'address' => 'Via Antonio Cantore 15, Milano',
                'image' => 'mX9RQuvwwC1KOxfYbxgyvAFotT7SuEuNHayFtPir.jpg',
                'p_iva' => '08100750010',
                'description' => 'Voglia di cucina italiana? Ordina dalla nostra osteria e grazie a DeliveBoo ricevi l\'ordine dove vuoi tu!',
                'type' => ['Italiano']
            ],
            [
                'name' => 'Le delizie di nonno Luca',
                'user_id' => $userLuca->id,
                'address' => 'Via Vezzani 21, Milano',
                'image' => 'ristorante-luca.jpg',
                'p_iva' => '60519704519',
                'description' => 'Stai cercando cucina italiana a domicilio? Grazie alle delizie di nonno Luca non hai più bisogno di cercare. Vai al suo menù su DeliveBoo e fai il tuo ordine ora!',
                'type' => ['Pizzeria', 'Italiano']
            ],
            [
                'name' => 'McBoo',
                'user_id' => $userPaola->id,
                'address' => 'Via Cornigliano 101, Milano',
                'image' => 'oy1z9TEP0ef5FX9vRz8NPJ2sqJVOuEik709lJ5az.jpg',
                'p_iva' => '71093710693',
                'description' => 'Stai cercando hamburger o fritti a domicilio? Con McBoo non hai più bisogno di cercare. Dai un\'occhiata al nostro menù su DeliveBoo e scegli le prelibatezze che preferisci!',
                'type' => ['Fast-Food']
            ],
            [
                'name' => 'Sapori d\'Oriente',
                'user_id' => $userBan->id,
                'address' => 'Via Roma 12, Milano',
                'image' => 'cucina-cinese.jpg',
                'p_iva' => '26385092734',
                'description' => 'Vuoi ordinare comodamente da casa tua dell\'ottimo cibo cinese? Allora sei nel posto giusto, da noi avrai il meglio ad un prezzo vantaggioso!',
                'type' => ['Cinese']
            ],
            [
                'name' => 'Sensei sushi',
                'user_id' => $userHaruna->id,
                'address' => 'Via dei Mille 36, Milano',
                'image' => 'cucina-giappo.jpg',
                'p_iva' => '84726599234',
                'description' => 'Voglia di sushi? Non temere visita il nostro menù, scegli il tuo piatto preferito e noi te lo portiamo a casa',
                'type' => ['Giapponese']
            ],
            [
                'name' => 'El barrio',
                'user_id' => $userPablo->id,
                'address' => 'Via Vittorio Emanuele 152, Milano',
                'image' => 'cucina-argentina.jpg',
                'p_iva' => '63548873421',
                'description' => 'Assaggia i nostri deliziosi piatti comodamente seduto sul divano, tu ordini noi te lo portiamo',
                'type' => ['Argentino']
            ],
            [
                'name' => 'Turkish kebab',
                'user_id' => $userMukki->id,
                'address' => 'Viale San Martino 111, Milano',
                'image' => 'kebab.jpg',
                'p_iva' => '09346502803',
                'description' => 'Kebab di prima scelta e molto altro da Indian kebab!',
                'type' => ['Kebab']
            ],
            [
                'name' => 'Indian restaurant',
                'user_id' => $userRaj->id,
                'address' => 'Via ghibellina 70/b, Milano',
                'image' => 'cucina-indiana.jpg',
                'p_iva' => '36488779245',
                'description' => 'Kebab di prima scelta e molto altro da Indian kebab!',
                'type' => ['Indiano', 'Kebab']
            ],
            [
                'name' => 'Thai lounge',
                'user_id' => $userChao->id,
                'address' => 'Via D. Alighieri 33, Milano',
                'image' => 'cucina-thai.jpg',
                'p_iva' => '46588334241',
                'description' => 'Il Thai lounge porta l\'oriente in casa tua con le sue specialità, lasciati sorprendere e ordina thai',
                'type' => ['Thailandese', 'Argentino']
            ],
            [
                'name' => 'Trattoria da Nonna Maria',
                'user_id' => $userMarcello->id,
                'address' => 'Via del Carmine 56, Milano',
                'image' => 'cucina-italiana.jpg',
                'p_iva' => '22475666983',
                'description' => 'Nella nostra trattoria troverai piatti unici cucinati con amore (e anche un po\' di artrite) dalla nonna Maria ',
                'type' => ['Italiano']
            ],
            [
                'name' => ' Pizzeria Italia 360',
                'user_id' => $userLuigi->id,
                'address' => 'Via del Cappero 88, Milano',
                'image' => 'pizzeria.jpg',
                'p_iva' => '98789856723',
                'description' => 'Tutto il sapore della vera pizza italiana a casa tua',
                'type' => ['Pizzeria']
            ],
            [
                'name' => 'Shangai',
                'user_id' => $userBruce->id,
                'address' => 'Piazza Duomo 2, Milano',
                'image' => 'shangai-risto.jpg',
                'p_iva' => '33343125675',
                'description' => 'Cina e Giappone si incontrano in un solo ristorante',
                'type' => ['Cinese', 'Giapponese']
            ],
            [
                'name' => 'Royal indian kebab',
                'user_id' => $userFranca->id,
                'address' => 'Via G. Marconi 54, Milano',
                'image' => 'royal-restaurant.jpg',
                'p_iva' => '22234545654',
                'description' => 'Mangia kebab per un mondo migliore',
                'type' => ['Kebab', 'Indiano']
            ],
            [
                'name' => 'KFBoo',
                'user_id' => $userFrancesco->id,
                'address' => 'Via San Giuliano 125, Milano',
                'image' => 'kfboo.jpg',
                'p_iva' => '75433398454',
                'description' => 'Un po\' di sana frittura non ha mai ucciso nessuno. -Cit Il mio cardiologo',
                'type' => ['Fast-Food', 'Pizzeria']
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
