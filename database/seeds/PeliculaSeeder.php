<?php

use Illuminate\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_PE'); // crea un faker en español Perú

        for ($i=0; $i<50; $i++) {
            \App\Pelicula::create([
                'formato' => $faker->randomElement(['mp4','mkv','acc','3d','mgb4']),
                'idioma' => $faker->randomElement(['Español','Latino','Ingles','Portuguez','Chino']),
                'item_id' => $faker->unique()->numberBetween(51, 100), //porque en item le puse que los primeros 50 items son libros
            ]);
        }
    }
}
