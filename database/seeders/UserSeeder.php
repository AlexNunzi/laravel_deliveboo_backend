<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Mario Rossi',
                'email' => 'mario.rossi@hotmail.it',
                'password' => 'ciaociao'
            ],
            [
                'name' => 'Luca Bianchi',
                'email' => 'luca.bianchi@hotmail.it',
                'password' => 'ciaociao'
            ],
            [
                'name' => 'Paola Verdi',
                'email' => 'paola.verdi@hotmail.it',
                'password' => 'ciaociao'
            ]
        ];

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        foreach ($users as $user) {
            $newUser = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);

            event(new Registered($newUser));
        }
    }
}
