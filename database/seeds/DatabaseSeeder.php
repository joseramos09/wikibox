<?php

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
        // $this->call('FileSeeder');

        factory(App\Users::class, 3)->create();
        $files = factory(App\Archivo::class, 20)->create();
    }
}
