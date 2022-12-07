<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Miembro;

class MiembroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Miembro::create([
            'idmiembro' => 1,
            'iduser' => 1,
            'iglesia' => 'Conavi',
            'bautizo' => 1
        ]);

        Miembro::create([
            'idmiembro' => 2,
            'iduser' => 2,
            'iglesia' => 'Conavi',
            'bautizo' => 0
        ]);

        Miembro::create([
            'idmiembro' => 3,
            'iduser' => 3,
            'iglesia' => 'Conavi',
            'bautizo' => 1
        ]);
        Miembro::create([
            'idmiembro' => 4,
            'iduser' => 4,
            'iglesia' => 'Conavi',
            'bautizo' => 0
        ]);

        Miembro::create([
            'idmiembro' => 5,
            'iduser' => 5,
            'iglesia' => 'Conavi',
            'bautizo' => 1
        ]);

        Miembro::create([
            'idmiembro' => 6,
            'iduser' => 6,
            'iglesia' => 'Conavi',
            'bautizo' => 0
        ]);

        Miembro::create([
            'idmiembro' => 7,
            'iduser' => 7,
            'iglesia' => 'Conavi',
            'bautizo' => 1
        ]);

        Miembro::create([
            'idmiembro' => 8,
            'iduser' => 8,
            'iglesia' => 'Conavi',
            'bautizo' => 1
        ]);

    }
}
