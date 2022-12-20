<?php

namespace App\Controllers;

class Portada
{

    public $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Controlador de la portada d'exemple del Framework Emeset
     * Framework d'exemple per a M07 Desenvolupament d'aplicacions web.
     * @author: Dani Prados dprados@cendrassos.net
     *
     * Carrega la portada
     *
     **/

    /**
     * ctrlPortada: Controlador que carrega  la portada
     *
     * @param $request contingut de la petiicó http.
     * @param $response contingut de la response http.
     * @param array $config  paràmetres de configuració de l'aplicació
     *
     **/
    function ctrlPortada($request, $response, $container)
    {

        $data = [];
        $shows = $container->get('show');
        $spectacle = $shows->getShows();
        //Get user session
        $user = $request->get("SESSION", "user");
        $user_id = $request->get('SESSION', 'id');
        $avatar = $request->get('SESSION', 'avatar');
        $data['user_id'] = $user_id;
        //Get all shows, favorites and representations
        $representation = $container->get('representation');
        $data['mapinfo'] = $representation->getMapinfo();


        $favorite = $container->get('favorite');
        $favorites = $favorite->getUserFavorites($user_id);

        //Link shows with favorites
        $fav = [];

        foreach ($favorites as $favo) {
            $fav[$favo['id_espectaculo_favorito']] = true;
        }

        //Send data
        $response->set('fav', $fav);
        $response->set('data', $data);
        $response->set('shows', $spectacle);
        $response->set('user', $user);
        $response->set('avatar', $avatar);
        $response->SetTemplate("portada.php");

        return $response;
    }

    public function sendMessage($request, $response, $container){

        //Get user id
        //Get type message with content and load it to DB
        $user_id=$request->get('SESSION','id');
        $type = $request->get(INPUT_POST,'type');
        $message_content= $request->get(INPUT_POST,'message');

        $message = $container->get('message');

        if ($message->addMessage($user_id,$type,$message_content)) {
            $response->set('query',true);
            return $response;
        }else{
            $response->set('query',false);
            return $response;
        }
        


    }
}
