<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\AsignacionRoles;

class AsigMinisterioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        AsignacionRoles::create([
            'idasignacionrol' => 1,
            "idministerio" => 1,
            "idmiembro" => 1, 
            "fechaInicio" => '2022-08-16', 
            "fechaFinal" => '2022-08-23'
        ]);

        AsignacionRoles::create([
            'idasignacionrol' => 2,
            "idministerio" => 2,
            "idmiembro" => 2, 
            "fechaInicio" => '2022-08-17', 
            "fechaFinal" => '2022-08-24'
        ]);

        AsignacionRoles::create([
            'idasignacionrol' => 3,
            "idministerio" => 3,
            "idmiembro" => 3, 
            "fechaInicio" => '2022-08-18', 
            "fechaFinal" => '2022-08-25'
        ]);
        AsignacionRoles::create([
            'idasignacionrol' => 4,
            "idministerio" => 4,
            "idmiembro" => 4, 
            "fechaInicio" => '2022-08-19', 
            "fechaFinal" => '2022-08-26'
        ]);
    }
}
