<?php

namespace App\Controllers;

use Emeset\Http\Response;

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
        $name = $request->get(INPUT_POST, "firstName");
        $second = $request->get(INPUT_POST, "secondName");
        $pass = $request->get(INPUT_POST, "password");

        $existence = $users->exist($email, $pass);

        if (!$existence) {
            $users->insertUser($name, $second, $email, $pass);
            $response->redirect("location: /login");
        } else {
            //* Send existence to singup view and brake
            $response->Set("existence", $existence);
            $response->redirect("location: /signup");
        }
        return $response;
    }
}
