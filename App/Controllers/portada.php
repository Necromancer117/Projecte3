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
<<<<<<< HEAD
function ctrlPortada($request, $response, $container)
{
    $data=[];
    $shows = $container->get('show');
    $spectacle = $shows->getShows();

    $user = $request->get("SESSION", "user") != NULL ? $request->get("SESSION", "user") : '';
    $user_id=$request->get('SESSION','id') != NULL ? $request->get('SESSION','id'):'';
    $data['user_id']=$user_id;

    $representation = $container->get('representation');
    $data['mapinfo'] = $representation->getMapinfo();

    $response->set('data',$data);
    $response->set('shows', $spectacle);
    $response->set('user', $user);
=======
function ctrlPortada($request, $response, $config)
{
   
>>>>>>> c96b473 (just pray)
    $response->SetTemplate("portada.php");

    return $response;
}
