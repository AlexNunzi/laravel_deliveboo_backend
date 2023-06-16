<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FoodSeeder extends Seeder
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

        $foods = [
            [
                'name' => 'Bacon burger',
                'restaurant_id' => $userPaola->restaurant->id,
                'price' => 7.50,
                'description' => 'Panino con hamburger di manzo 150g, bacon, formaggio, insalata, pomodoro e salse.',
                'image' => 'E6yeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkvS.jpg',
            ],
            [
                'name' => 'Lasagne al ragù',
                'restaurant_id' => $userLuca->restaurant->id,
                'price' => 8.00,
                'description' => 'Lasagne con ragù di carne dal gusto deciso.',
                'image' => 'AAyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkAA.jpg',
            ],
            [
                'name' => 'Medaglioni di pollo impanati',
                'restaurant_id' => $userPaola->restaurant->id,
                'price' => 4.00,
                'description' => 'Medaglioni di pollo con panatura croccante da cuore tenero.',
                'image' => 'BByeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkBB.jpg',
            ],
            [
                'name' => 'Patatine fritte',
                'restaurant_id' => $userPaola->restaurant->id,
                'price' => 3.00,
                'description' => 'Patatine fritte croccantissime e deliziose.',
                'image' => 'CCyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkCC.jpg',
            ],
            [
                'name' => 'Pizza con tartare di dentice e pomodoro datterino',
                'restaurant_id' => $userLuca->restaurant->id,
                'price' => 9.50,
                'description' => 'Deliziosa accoppiata, metà pizza con tartare di dentice freschissimo e metà margherita con pomodoro datterino.',
                'image' => 'DDyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkDD.jpg',
            ],
            [
                'name' => 'Pizza con pomodoro datterino e mozzarella',
                'restaurant_id' => $userLuca->restaurant->id,
                'price' => 6.00,
                'description' => 'Deliziosa pizza margherita con pomodoro datterino e mozzarella.',
                'image' => 'EEyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkEE.jpg',
            ],
            [
                'name' => 'Pizza mozzarella, mortadella, crema di pistacchio e basilico',
                'restaurant_id' => $userLuca->restaurant->id,
                'price' => 9.00,
                'description' => 'Deliziosa pizza mozzarella, mortadella, una pioggia di crema di pistacchio e non può mancare dell\'ottimo basilico fresco.',
                'image' => 'FFyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkFF.jpg',
            ],
            [
                'name' => 'Spaghetti all\'Amatriciana',
                'restaurant_id' => $userMario->restaurant->id,
                'price' => 7.00,
                'description' => 'Deliziosi spaghetti all\'Amatriciana realizzati con ingredienti di prima scelta per ottenere un sapore strepitoso',
                'image' => 'GGyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkGG.jpg',
            ],
            [
                'name' => 'Spaghetti cacio e pepe',
                'restaurant_id' => $userMario->restaurant->id,
                'price' => 7.00,
                'description' => 'Spaghetti avvolti dalla cremosità del formaggio arricchiti dal sapore deciso del pepe per un\'esplosione di gusto.',
                'image' => 'HHyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkHH.jpg',
            ],
            [
                'name' => 'Spaghetti alla carbonara',
                'restaurant_id' => $userMario->restaurant->id,
                'price' => 7.00,
                'description' => 'Spaghetti alla carbonara deliziosi e cremosi con guanciale, pecorino, uova di prima scelta e una spolverata di pepe nero, non potrai dimenticarli, parola di Paolo, nostro cliente affezionato.',
                'image' => 'IIyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkII.jpg',
            ]
        ];

        // Controllo se la cartella image nello storage è presente
        // storage/app/public/image
        if (!file_exists(storage::path('image'))) {

            // Se non esiste la creo
            File::makeDirectory(storage::path('image'));
        }

        foreach ($foods as $food) {

            // Per ogni food copio l'immagine contenuta all'interno di public/img/{nome immagine}
            // all'interno della cartella storage/app/public/image
            File::copy(
                public_path('img/' . $food['image']),
                storage::path('image/' . $food['image'])
            );

            $newFood = new Food();
            $newFood->name = $food['name'];
            $newFood->restaurant_id = $food['restaurant_id'];
            $newFood->price = $food['price'];
            $newFood->description = $food['description'];
            $newFood->image = 'image/' . $food['image'];
            $newFood->slug = Food::generateSlug($newFood->name);

            $newFood->save();
        }
    }
}
