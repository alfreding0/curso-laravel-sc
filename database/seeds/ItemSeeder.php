<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_PE'); // crea un faker en español Perú

        //para libros
        for ($i=0; $i<50; $i++) {
            \App\Item::create([
                'nombre' => $faker->sentence(2),
                'creador' => $faker->name,
                'copias' => $faker->numberBetween(1, 500),
                'precio' => ($faker->numberBetween(1, 100) / 2) * 3,
                'tipo' => 1,
                'genero_id' => $faker->numberBetween(1,8),
            ]);
        }



        //para peliculas
        for ($i=0; $i<50; $i++) {
            \App\Item::create([
                'nombre' => $faker->sentence(2),
                'creador' => $faker->name,
                'copias' => $faker->numberBetween(1, 500),
                'precio' => ($faker->numberBetween(1, 100) / 2) * 3,
                'tipo' => 2,
                'genero_id' => $faker->numberBetween(1,8),
            ]);
        }
    }
}
