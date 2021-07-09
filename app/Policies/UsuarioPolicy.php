<?php

namespace App\Policies;

use App\Persona;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsuarioPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $authUsuario, Persona $persona)
    {
        return $authUsuario->persona_id === $persona->id;
    }
}
