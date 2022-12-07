<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\MinisterioAsignacion;

class MinisteriosAsigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        MinisterioAsignacion::create([
            'idministerioasignacion' => 1,
            'iduser' => 1,
            'idasignacionrol' => 1
        ]);

        MinisterioAsignacion::create([
            'idministerioasignacion' => 2,
            'iduser' => 2,
            'idasignacionrol' => 1
        ]);

        MinisterioAsignacion::create([
            'idministerioasignacion' => 3,
            'iduser' => 3,
            'idasignacionrol' => 2
        ]);
        MinisterioAsignacion::create([
            'idministerioasignacion' => 4,
            'iduser' => 4,
            'idasignacionrol' => 2
        ]);

        MinisterioAsignacion::create([
            'idministerioasignacion' => 5,
            'iduser' => 5,
            'idasignacionrol' => 3
        ]);

        MinisterioAsignacion::create([
            'idministerioasignacion' => 6,
            'iduser' => 6,
            'idasignacionrol' => 3
        ]);
        MinisterioAsignacion::create([
            'idministerioasignacion' => 7,
            'iduser' => 7,
            'idasignacionrol' => 4
        ]);
        MinisterioAsignacion::create([
            'idministerioasignacion' => 8,
            'iduser' => 8,
            'idasignacionrol' => 4
        ]);
    }
}
