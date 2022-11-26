<?php

namespace App\Controllers;

class AccountSettings{

    public $container;
    public function __construct($container){
        $this->container=$container;
    }

    public function ctrlAccountSettings($request, $response, $container){

        
        
        $response->setTemplate('accountSettings.php');
        return $response;
    }

    public function ajaxSelector($request, $response, $container){

        $selector = $request->get(INPUT_POST,'select');
        $user_id = $request->get('SESSION','id');

        switch ($selector) {
            case 'check_pass':
                $pass=$request->get(INPUT_POST,'pass');
                $user=$container->get('user');
                $user->checkPass($user_id,$pass);
                
                break;
            
            default:
                # code...
                break;
        }



        return $response;
    }
    
}