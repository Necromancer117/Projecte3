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

class creatorShows
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
  function ctrlShows($request, $response, $container)
  {
    // Comptem quantes vegades has visitat aquesta pàgina
    
    $error = $request->get("SESSION", "error");
    $repre = $container->get('representation');

    // * DONEM CONEXIO A LA BASE DE DADES
    $showConn = $container->get('show');
    // * RETORNA TOTES LES EDICIONS
    $showEditon = $showConn->getEdicion();
    $data = isset($edition) ? $edition : date('Y');
    $edition = '2023';
    $showList = $showConn->getCretorShows($data);    
    
    // ! ERRORS
    $response->set("error", $error);
    $response->setSession("error", "");

    // ? VARS
    $response->set("edition",$edition);
    $response->set("showList",$showList);
    $response->set("showEditon",$showEditon);


    $response->SetTemplate("creatorShows.php");
    
    return $response;
  }
}
