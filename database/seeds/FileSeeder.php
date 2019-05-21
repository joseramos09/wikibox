<?php

use Illuminate\Database\Seeder;
use Faker\Factory as faker;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = faker::create();

        for ($i=0;$i < 50;$i++){
            \DB::table('upload_file')->insert(array(
                'name' => $faker->studentFile,
                'description' => $faker->descriptionFile

            ));
        }
    }
}
