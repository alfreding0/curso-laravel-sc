<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //persona administrador
        \App\Persona::create([
            'nombre' => 'Administrador',
            'telefono' => '1010',
            'correo' => 'admin@gmail.com',
            'carnet_identidad' => '1010',
            'direccion' => 'admin_direcicon',
            'tipo' => 1,
        ]);
        //usuario adminstrador
        App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
//            'remember_token' => Str::random(10),
            'persona_id' => 1,
        ]);












        //generamos más usuarios al azar solo para que sean más :v haha
        for ($i = 1; $i < 4; $i ++){
            $persona = new \App\Persona();
            $persona->nombre = 'Usuario-'.$i;
            $persona->telefono = '5185654-'.$i;
            $persona->correo = 'usuario'.$i.'@gmail.com';
            $persona->carnet_identidad = '1010-'.$i;
            $persona->direccion = 'direc-user-'.$i;
            $persona->tipo = 1;
            $persona->save();

            App\User::create([
                'name' => 'usuario'.$i,
                'email' => 'usuario'.$i.'@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin'),
//                'remember_token' => Str::random(10),
                'persona_id' => $persona->id,
            ]);
        }
    }
}
