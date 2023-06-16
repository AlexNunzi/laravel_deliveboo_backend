<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'image' => 'img/link'
            ],
            [
                'name' => 'Cinese',
                'image' => 'img/link'
            ],
            [
                'name' => 'Giapponese',
                'image' => 'img/link'
            ],
            [
                'name' => 'Fast-Food',
                'image' => 'img/link'
            ],
            [
                'name' => 'Pizzeria',
                'image' => 'img/link'
            ],
            [
                'name' => 'Argentino',
                'image' => 'img/link'
            ],
            [
                'name' => 'Kebab',
                'image' => 'img/link'
            ],
            [
                'name' => 'Indiano',
                'image' => 'img/link'
            ],
            [
                'name' => 'Thailandese',
                'image' => 'img/link'
            ]
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->image = $type['image'];
            $newType->save();
        }
    }
}
