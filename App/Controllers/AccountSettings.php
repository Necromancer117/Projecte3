<?php

namespace App\Controllers;

class AccountSettings
{

    public $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function ctrlAccountSettings($request, $response, $container)
    {



        $response->setTemplate('accountSettings.php');
        return $response;
    }

    public function ajaxSelector($request, $response, $container)
    {

        $selector = $request->get(INPUT_POST, 'select');

        $user_id = $request->get('SESSION', 'id');
        $response->set('result', $selector);
        $users = $container->get('users');

        switch ($selector) {
            case 'check_pass':

                $pass = $request->get(INPUT_POST, 'pass');

                $result = $users->checkPass($user_id, $pass);

                $response->set('result', $result);
                break;
            case 'update_pass':

                $pass = $request->get(INPUT_POST, 'pass');

                $users->UpdateUser('contrasena_usuario', $pass, $user_id);
                break;
            case 'update_firstname':
                
                $value = $request->get(INPUT_POST,'value');
                $users->UpdateUser('nombre_usuario',$value,$user_id);
                break;
            case 'update_lastname':
                $value = $request->get(INPUT_POST,'value');
                $users->UpdateUser('apellido_usuario',$value,$user_id);
                break;
            case 'update_mail':
                $value = $request->get(INPUT_POST,'value');
                $users->UpdateUser('mail_usuario',$value,$user_id);
                break;

            default:
                
                break;
        }

        return $response;
    }

    public function upload($request, $response, $container){

        $img = $_FILES;
        echo($img);

        return $response;
    }
}
