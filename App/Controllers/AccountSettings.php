<?php

namespace App\Controllers;

class AccountSettings{

    public $container;
    public function __construct($container){
        $this->container=$container;
    }

    public function ctrlAccountSettings($request, $response, $container){


        print_r('hola');
        die();
    }
    
}