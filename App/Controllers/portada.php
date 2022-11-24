<?php

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
    $data=[];
    $shows = $container->get('show');
    $spectacle = $shows->getShows();

    $user = $request->get("SESSION", "user");

    $representation = $container->get('representation');
    $data['mapinfo'] = $representation->getMapinfo();

    $response->set('data',$data);
    $response->set('shows', $spectacle);
    $response->set('user', $user);
    $response->SetTemplate("portada.php");

    return $response;
}
