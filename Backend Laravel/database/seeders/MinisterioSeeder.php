<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Ministerio;

class MinisterioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ministerio::create([
            'idministerio' => 1,
            'nombreRol' => 'Limpieza'
        ]);

        Ministerio::create([
            'idministerio' => 2,
            'nombreRol' => 'Diaconisa'
        ]);


        Ministerio::create([
            'idministerio' => 3,
            'nombreRol' => 'Diacono'
        ]);


        Ministerio::create([
            'idministerio' => 4,
            'nombreRol' => 'Predicador'
        ]);
    }
}
