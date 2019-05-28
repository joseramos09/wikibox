<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed de la aplicacion con el cual llenamos la base de datos.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class, 3)->create();
        factory(App\Archivos::class, 20)->create();
    }
}
