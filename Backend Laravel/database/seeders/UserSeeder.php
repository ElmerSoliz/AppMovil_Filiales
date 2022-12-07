<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Validator;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // $user = User::create([
        //     'id' => 1,
        //     'name' => 'Jesus',
        //     'email' => 'jesus@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('11111111'),
        // ]);
        // // $user->hasPermissionTo('miembros.index', 'admin');
        // $user->assignRole('administrador');
        
    
        User::create([
            'id' => 1,
            'name' => 'Jesus',
            'email' => 'jesus@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('11111111'),
        ])->assignRole('administrador');
        
        User::create([
            'id' => 2,
            'name' => 'Ronal',
            'email' => 'ronal@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('22222222'),
        ])->assignRole('cliente');
        User::create([
            'id' => 3,
            'name' => 'Josue',
            'email' => 'josue@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('33333333'),
        ])->assignRole('cliente');
        User::create([
            'id' => 4,
            'name' => 'Jhon',
            'email' => 'jhon@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('44444444'),
        ])->assignRole('cliente');
        User::create([
            'id' => 5,
            'name' => 'Jose',
            'email' => 'jose@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('55555555'),
        ])->assignRole('cliente');

        User::create([
            'id' => 6,
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('66666666'),
        ])->assignRole('cliente');
        User::create([
            'id' => 7,
            'name' => 'Romer',
            'email' => 'romer@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('77777777'),
        ])->assignRole('cliente');
        User::create([
            'id' => 8,
            'name' => 'Armin',
            'email' => 'armin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('88888888'),
        ])->assignRole('cliente');


        User::factory(9)->create();
    }
}
