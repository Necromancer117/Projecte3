<?php

namespace App\Controllers;

class Favorites
{

    public $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function ctrlMyfavorites($request, $response, $container)
    {
        //Load template 
        //Get all shows and favorites and build a new array that links shows with favorites
        $shows = $container->get('show');
        $spectacle = $shows->getShows();
        $user_id = $request->get('SESSION', 'id');
        $user = $request->get("SESSION", "user");

        $favorite = $container->get('favorite');
        $favorites = $favorite->getUserFavorites($user_id);

        $fav = [];

        foreach ($favorites as $favo) {
            $fav[$favo['id_espectaculo_favorito']] = true;
        }
        $response->set('fav',$fav);
        $response->set('shows', $spectacle);
        $response->set('user', $user);
        $response->setTemplate('myfavorites.php');
        return $response;
    }

    public function addFavorite($request, $response, $container)
    {
        //Add favorite AJAX with selector
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
