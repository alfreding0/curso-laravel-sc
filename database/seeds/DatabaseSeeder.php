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
        $this->call(UserSeeder::class);
        $this->call(PersonaSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(LibroSeeder::class);
        $this->call(PeliculaSeeder::class);
    }
}
