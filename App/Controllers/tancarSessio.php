<?php


namespace App\Controllers;

class tancarSessio
{

  public $container;

  public function __construct($container)
  {
    $this->container = $container;
  }
  /**
   * Controlador que gestiona el procés de login
   * Framework d'exemple per a M07 Desenvolupament d'aplicacions web.
   * @author: Dani Prados dprados@cendrassos.net
   *
   * Comprova si l'usuari s'ha autentificat correctament
   *
   **/

  /**
   * ctrlValidarLogin: Controlador que comprova si l'usuari s'ha autentificat
   * correctament
   *
   * @param $request contingut de la peticó http.
   * @param $response contingut de la response http.
   * 
   *
   **/
  function ctrlTancarSessio($request, $response, $container)
  {

    $response->setSession("loged", false);
    session_destroy();
    $response->redirect("location: /");

    return $response;
  }
}
