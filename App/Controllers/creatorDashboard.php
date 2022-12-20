<?php

/**
 * Controlador de login d'exemple del Framework Emeset
 * Framework d'exemple per a M07 Desenvolupament d'aplicacions web.
 * @author: Dani Prados dprados@cendrassos.net
 *
 * Carrega la pàgina de login
 *
 **/

namespace App\Controllers;

class creatorDashboard
{

  public $contenidor;

  public function __construct($contenidor)
  {
    $this->contenidor = $contenidor;
  }
  /**
   * ctrlLogin: Controlador que carrega  la pàgina de login
   *
   * @param $request contingut de la peticó http.
   * @param $response contingut de la response http.
   * @param array $config  paràmetres de configuració de l'aplicació
   *
   **/
  function ctrlDashboard($request, $response, $container)
  {
    // Comptem quantes vegades has visitat aquesta pàgina
    
    $error = $request->get("SESSION", "error");
    $repre = $container->get('representation');
    
    $response->set("error", $error);
    $response->setSession("error", "");

    $response->SetTemplate("creatorDashboard.php");
    
    return $response;
  }
}