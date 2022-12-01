<?php

namespace App\Controllers;

class Favorites
{

    public $container;

    public function __construct($container)
    {
        $this->container = $container;
    }


    public function addFavorite($request, $response, $container)
    {

        $user_id = $request->get('SESSION', 'id');
        $id_show = $request->get(INPUT_POST, 'value');
        $selector = $request->get(INPUT_POST, 'selector');

        switch ($selector) {
            case 'add':
                $favorite = $container->get('favorite');
                $favorite->insertFavorite($user_id, $id_show);
                break;

            case 'remove':
                $favorite = $container->get('favorite');
                $favorite->deleteFavorite($user_id, $id_show);
                break;

            default:
                # code...
                break;
        }

        return $response;
    }
}
