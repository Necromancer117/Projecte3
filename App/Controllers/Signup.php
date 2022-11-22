<?php

namespace App\Controllers;

class Signup
{
    public $contenidor;

    public function __construct($contenidor)
    {
        $this->contenidor = $contenidor;
    }

    public function ctrlInsertUser($request, $response, $container)
    {
        $users = $container["users"];

        /* ---- ACCES TO VARIABLES ----  */
        $email = $request->get(INPUT_POST, "email");
        $nom = $request->get(INPUT_POST, "firstName");
        $cognoms = $request->get(INPUT_POST, "secondName");
        $contrasenya = $request->get(INPUT_POST, "password");

        // $existence = //does it exist
        // if (!$existence) {
        //     /*Insert the user*/
        // }
        // else {
        //     /*Show alert the folowing email exists*/
        // }
    }
}
