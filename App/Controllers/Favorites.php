<?php

namespace App\Controllers;

class Favorites{

    public $container;

    public function __construct($container)
    {
        $this->container=$container;
    }


    public function addFavorite($request,$response,$container){

        $user_id = $request->get('SESSION','id');
        $id_show = $request->get(INPUT_POST,'value');
        echo($id_show);
        return $response;
    }
}