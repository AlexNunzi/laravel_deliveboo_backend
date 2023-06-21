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
                'visibility' => false,
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
            ],

            //risto cinese
            [
                'name' => 'Ravioli al vapore',
                'restaurant_id' => $userBan->restaurant->id,
                'price' => 4.00,
                'description' => 'Ravioli con ripeno speciale seguendo la segretissima ricetta della nonna Mao,non resterai deluso/a',
                'image' => 'ravioli-con-gamberi-al-vapore.jpg',
            ],
            [
                'name' => 'Spaghetti di soia con gamberi ',
                'restaurant_id' => $userBan->restaurant->id,
                'price' => 5.00,
                'description' => 'Spaghetti di soia con gamberi freschissimi con verdure saltate',
                'image' => 'spaghetti-con-gamberi.jpg',
            ],
            [
                'name' => 'Anatra alla piastra',
                'restaurant_id' => $userBan->restaurant->id,
                'price' => 7.00,
                'description' => 'Anatra freschissima del giardino di nonno Giuseppe, da provare almeno una volta nella vita',
                'image' => 'anatra-alla-piastra.jpg',
            ],
            //risto giapponese
            [
                'name' => 'Hosomaki fritto ',
                'restaurant_id' => $userHaruna->restaurant->id,
                'price' => 7.00,
                'description' => 'Sake hosomaki fritto, philadelphia e salsa teriyaki',
                'image' => 'Hosomaki-fritto.jpg',
            ],
            [
                'name' => 'Futomaki classico',
                'restaurant_id' => $userHaruna->restaurant->id,
                'price' => 6.00,
                'description' => 'philadelphia, avocado, salmone, cipolla fritta e salsa teriyaki',
                'image' => 'futomaki.jpg',
            ],
            [
                'name' => 'Sashimi misto ',
                'restaurant_id' => $userHaruna->restaurant->id,
                'price' => 12.00,
                'description' => 'Sashimi di salmone,tonno e branzino abbattuto secondo direttive nazionali',
                'image' => 'sashimi.jpg',
            ],
            //risto argentino
            [
                'name' => 'Empanadas di carne',
                'restaurant_id' => $userPablo->restaurant->id,
                'price' => 8.00,
                'description' => 'Panzerotto artigianale argentino ripieno di carne black angus e spezie tipiche',
                'image' => 'empanada.jpg',
            ],
            [
                'name' => 'Picanha',
                'restaurant_id' => $userPablo->restaurant->id,
                'price' => 17.00,
                'description' => 'Il taglio di carne più amato dai latino americani, 300g di scamone argentino alla griglia ',
                'image' => 'picanha.jpg',
            ],
            [
                'name' => 'Tamal',
                'restaurant_id' => $userPablo->restaurant->id,
                'price' => 17.00,
                'description' => 'Impasto a base di mais ripieno di maiale, olive,uova e spezie',
                'image' => 'tamal.jpg',
            ],
            //kebab
            [
                'name' => 'Piadina kebab',
                'restaurant_id' => $userMukki->restaurant->id,
                'price' => 4.00,
                'description' => 'piadina con kebab, cipolla,peperoni e patatine fritte',
                'image' => 'piadina-kebab.jpeg',
            ],
            [
                'name' => 'Allu Palak',
                'restaurant_id' => $userMukki->restaurant->id,
                'price' => 6.00,
                'description' => 'Patate con spinaci',
                'image' => 'allu-palak.jpg',
            ],
            [
                'name' => 'Pollo al curry ',
                'restaurant_id' => $userMukki->restaurant->id,
                'price' => 8.00,
                'description' => 'Morbidissimi bocconcini di pollo piccante al curry',
                'image' => 'pollo-al-curry.jpg',
            ],
            //risto indiano/kebab
            [
                'name' => 'Focaccia  al formaggio',
                'restaurant_id' => $userRaj->restaurant->id,
                'price' => 4.50,
                'description' => 'Tipica focaccia indina ripiena di formaggio fuso cotta nel forno di terracotta',
                'image' => 'focaccia.jpg',
            ],
            [
                'name' => 'Riso al cocco',
                'restaurant_id' => $userRaj->restaurant->id,
                'price' => 6.50,
                'description' => 'Riso aromatizzato con cocco fresco ,spezie e arachidi',
                'image' => 'riso-al-cocco.jpg',
            ],
            [
                'name' => 'Pollo al burro',
                'restaurant_id' => $userRaj->restaurant->id,
                'price' => 11.50,
                'description' => 'Pollo disossato servito in salsa di anacardi, burro,pomodoro e miele',
                'image' => 'pollo-al-burro.jpg',
            ],
            //risto thailandese
            [
                'name' => 'Pollo con anacardi',
                'restaurant_id' => $userChao->restaurant->id,
                'price' => 12.50,
                'description' => 'Pollo fritto con anacardi in salsa aromatizzata con cipolla, sedano e peperoni.',
                'image' => 'pollo-con-anacardi.jpg',
            ],
            [
                'name' => 'Riso all\'ananas',
                'restaurant_id' => $userChao->restaurant->id,
                'price' => 14.50,
                'description' => 'Riso fritto all\'ananas con cipollotti,carote,uova e anacardi',
                'image' => 'riso-ananas.jpg',
            ],
            [
                'name' => 'Insalata di papaya',
                'restaurant_id' => $userChao->restaurant->id,
                'price' => 13.00,
                'description' => 'Insalata di papaya verde con peperoncino,limone e zucchero, con possibile aggiunta di salsa di pesce solo nei giorni pari di plenilunio',
                'image' => 'insalata-papaya.jpg',
            ],
            //ristorante italiano
            [
                'name' => 'Italia 2006',
                'restaurant_id' => $userMarcello->restaurant->id,
                'price' => 12.00,
                'description' => 'Pasta e patate con provola in cialda di formaggio',
                'image' => 'pasta-patate.jpg',
            ],
            [
                'name' => 'Salsiccia con friarielli',
                'restaurant_id' => $userMarcello->restaurant->id,
                'price' => 8.00,
                'description' => 'Salsiccia alla brace con friarielli e patate fresche',
                'image' => 'salsiccia-friarielli.jpg',
            ],
            [
                'name' => 'Spada alla brace',
                'restaurant_id' => $userMarcello->restaurant->id,
                'price' => 15.00,
                'description' => 'Pesce Spada alla Brace con insalata',
                'image' => 'pesce-spada.jpg',
            ],
            //pizzeria
            [
                'name' => 'Alfredo\'s Pizza',
                'restaurant_id' => $userLuigi->restaurant->id,
                'price' => 15.00,
                'description' => 'Salsa Alfredo, mozzarella,funghi,spinaci e prezzemolo fresco.La pizza italiana per eccellenza è la pizza Alfredo',
                'image' => 'alfredo-pizza.jpg',
            ],
            [
                'name' => 'Pizza Hawaiana',
                'restaurant_id' => $userLuigi->restaurant->id,
                'price' => 15.00,
                'description' => 'Salsa,mozzarella,prosciutto cotto, ananas',
                'image' => 'pizza-malvagia.jpg',
            ],
            [
                'name' => 'Bella Napoli',
                'restaurant_id' => $userLuigi->restaurant->id,
                'price' => 15.00,
                'description' => 'Salsa,mozzarella di bufala,cozze,funghi',
                'image' => 'pizza-blasfema.jpg',
            ],
            //risto giappo/cinese
            [
                'name' => 'Udon saltato con verdure',
                'restaurant_id' => $userBruce->restaurant->id,
                'price' => 6.50,
                'description' => 'uova, germogli di soia, carote, cavolo e cipolla',
                'image' => 'udon.jpg',
            ],
            [
                'name' => 'Chirashi salmone',
                'restaurant_id' => $userBruce->restaurant->id,
                'price' => 13.00,
                'description' => 'Polpetta di riso con salmone',
                'image' => 'chirashi.jpg',
            ],
            [
                'name' => 'Carpaccio misto',
                'restaurant_id' => $userBruce->restaurant->id,
                'price' => 12.00,
                'description' => 'Carpaccio con salmone, tonno e branzino',
                'image' => 'carpaccio.jpg',
            ],
            [
                'name' => 'Ramen di manzo',
                'restaurant_id' => $userBruce->restaurant->id,
                'price' => 8.00,
                'description' => 'Spaghetti fatti a mano con verdure miste, uova e manzo',
                'image' => 'ramen.jpg',
            ],
            //risto kebab/indiano
            [
                'name' => 'Kebab al piatto',
                'restaurant_id' => $userFranca->restaurant->id,
                'price' => 4.50,
                'description' => 'Kebab con cipolla, peperoni e patatine fritte ',
                'image' => 'piatto-kebab.jpg',
            ],
            [
                'name' => 'Falafel',
                'restaurant_id' => $userFranca->restaurant->id,
                'price' => 3.00,
                'description' => 'Deliziose polpette speziate ai legumi',
                'image' => 'falafel.jpg',
            ],
            [
                'name' => 'Masala dosa',
                'restaurant_id' => $userFranca->restaurant->id,
                'price' => 4.00,
                'description' => 'Crepe di riso ripiena di patate aromatizzate',
                'image' => 'masala.jpg',
            ],
            //pizzeria/fast-food
            [
                'name' => 'Capuozzo Burger',
                'restaurant_id' => $userFrancesco->restaurant->id,
                'price' => 13.00,
                'description' => 'Hamburger di scottona,cipolle caramellate,burrata, pesto di pistacchio e amore ❤️',
                'image' => 'burger.jpg',
            ],
            [
                'name' => 'Porky Burger',
                'restaurant_id' => $userFrancesco->restaurant->id,
                'price' => 12.00,
                'description' => 'Hamburger,porchetta di Ariccia,pomodori secchi e fontina',
                'image' => 'porky.jpg',
            ],
            [
                'name' => 'Ribs',
                'restaurant_id' => $userFrancesco->restaurant->id,
                'price' => 10.00,
                'description' => 'Ribs morbidissime in salsa barbecue',
                'image' => 'ribs.jpg',
            ],
            [
                'name' => 'Patatine cheddar e bacon',
                'restaurant_id' => $userFrancesco->restaurant->id,
                'price' => 5.50,
                'description' => 'Patatine fritte ricoperte da una fonduta di formaggio cheddar e scaglie di bacon fritto',
                'image' => 'patacheese.jpg',
            ],
            [
                'name' => 'Pizza ai 4 formaggi+',
                'restaurant_id' => $userFrancesco->restaurant->id,
                'price' => 14.00,
                'description' => 'Mozzarella,provola,gorgonzola,parmiggiano, miele e noci',
                'image' => '4-formaggi.jpg',
            ],

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

            if (array_key_exists('visibility', $food)) {
                $newFood->visibility = $food['visibility'];
            }

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
