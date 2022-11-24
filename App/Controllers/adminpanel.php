<?php

namespace App\Controllers;

class adminpanel
{

    public $contenidor;

    public function __construct($contenidor)
    {
        $this->contenidor = $contenidor;
    }
    public function ctrlAdminpanel($request, $response, $container)
    {
        $response->SetTemplate("adminpanel.php");
        return $response;
    }
}
