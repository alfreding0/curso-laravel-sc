<?php

use Illuminate\Database\Seeder;

class LibroSeeder extends Seeder
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
            \App\Libro::create([
                'edicion' => $faker->numberBetween(1,10),
                'publicacion' => now(),
                'editorial' => $faker->name,
                'item_id' => $faker->unique()->numberBetween(1, 50), //porque en item le puse que los primeros 50 items son libros
            ]);
        }
    }
}
