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
    $shows = $container->get('show');
    $user = $request->get("SESSION", "user");
    $response->set('user',$user);
    $response->SetTemplate("portada.php");

    return $response;
}
