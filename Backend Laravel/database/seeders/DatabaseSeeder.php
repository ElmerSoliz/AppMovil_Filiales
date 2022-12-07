<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class
        ]);
        $this->call([
            UserSeeder::class
        ]);
        
        $this->call([
            MinisterioSeeder::class
        ]);

        $this->call([
            MiembroSeeder::class
        ]);

        $this->call([
            AsigMinisterioSeeder::class
        ]);
        
        $this->call([
            MinisteriosAsigSeeder::class
        ]);

    }
}
