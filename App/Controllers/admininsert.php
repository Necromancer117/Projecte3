<?php

namespace App\Controllers;

class admininsert
{

    public $contenidor;

    public function __construct($contenidor)
    {
        $this->contenidor = $contenidor;
    }
    public function ctrlAdmininsert($request, $response, $container)
    {
        $users = $container->get('users');
        $list=$users->getAllUsers();
        //var_dump($list);
        //die;
        $response->set("list",$list);
        $response->SetTemplate("adminpanel.php");
        return $response;
    }
}