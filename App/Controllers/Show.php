<?php

namespace App\Controllers;

class Show{

    public $container;
    public function __construct($container){
    
        $this->container=$container;
        
    }

    public function ctrlShow($request, $response, $container){

        $id=$request->getParam('id');

        print_r($id);
        die();

        return $response;

    }

}