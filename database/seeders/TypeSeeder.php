<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Italiano',
                'image' => 'OOyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkOO.jpg'
            ],
            [
                'name' => 'Cinese',
                'image' => 'KKyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkKK.jpg'
            ],
            [
                'name' => 'Giapponese',
                'image' => 'MMyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkMM.jpg'
            ],
            [
                'name' => 'Fast-Food',
                'image' => 'LLyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkLL.jpg'
            ],
            [
                'name' => 'Pizzeria',
                'image' => 'QQyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkQQ.jpg'
            ],
            [
                'name' => 'Argentino',
                'image' => 'JJyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkJJ.jpg'
            ],
            [
                'name' => 'Kebab',
                'image' => 'PPyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkPP.jpg'
            ],
            [
                'name' => 'Indiano',
                'image' => 'NNyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkNN.jpg'
            ],
            [
                'name' => 'Thailandese',
                'image' => 'RRyeFOcMYInGg1sF83GkpTkWxS3gUlo3oaSyNkRR.jpg'
            ]
        ];

        // Controllo se la cartella image nello storage è presente
        // storage/app/public/image
        if (!file_exists(storage::path('image'))) {

            // Se non esiste la creo
            File::makeDirectory(storage::path('image'));
        }

        foreach ($types as $type) {

            // Per ogni type copio l'immagine contenuta all'interno di public/img/{nome immagine}
            // all'interno della cartella storage/app/public/image
            File::copy(
                public_path('img/' . $type['image']),
                storage::path('image/' . $type['image'])
            );

            $newType = new Type();
            $newType->name = $type['name'];
            $newType->image = 'image/' . $type['image'];
            $newType->save();
        }
    }
}
