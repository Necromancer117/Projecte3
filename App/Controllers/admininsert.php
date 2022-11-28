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
        $name = $request->get(INPUT_POST, "insertusername");
        $surename= $request->get(INPUT_POST, "insertusersurename");
        $mail= $request->get(INPUT_POST, "insertusermail");
        $password= $request->get(INPUT_POST, "insertuserpassword");
        $avatar= $request->get(INPUT_POST, "insertuseravatar");
        $role= $request->get(INPUT_POST, "insertuserrole");
        $users = $container->get('users');
        
        $users->insertAdminUser($name,$surename,$mail,$password,$avatar,$role);

        $response->redirect("location: /adminpanel");
        return $response;
    }

    public function ctrlAdminUpdate($request, $response, $container){
        
    }
}