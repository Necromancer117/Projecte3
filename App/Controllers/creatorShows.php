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

    //$edition = $peticio->get(INPUT_POST, "data");
    $edition = "2023";
    // * DENOMINEM EL VALOR DATE AMB UN DEFAULT DE EL ANY ACTUAL EN EL CAS DE NO HAVER SELECCIONAT CAP ALTRE DATA
    $date = isset($edition) ? $edition : date('Y');

    // * DONEM CONEXIO A LA BASE DE DADES
    $showConn = $container->get('show');
    // * RETORNA TOTES LES EDICIONS
    $showEditon = $showConn->getEdicion();
    // * RETORNA TOTS ELS SHOWS SEGONS EL VALOR $date
    $showList = $showConn->getCreatorShows($date);    


    // ? VOTE SECTION

    $vote = $container->get('vote');

    $curShows = $showConn -> getShows();
    $dataVotes = [];

    foreach ($curShows as $show) {
       $res= $vote -> getAvgVote($show['id_espectaculo']);
       
       if (is_null($res['votos'])){
        $res['votos']=0;
       }
        $dataVotes [$show['nombre_espectaculo']] = floatval($res['votos']);  
    }
    
    // ? END VOTE SECTION
    
    // ! ERRORS
    $response->set("error", $error);
    $response->setSession("error", "");

    // ? VARS
    $response->set('dataVotes',$dataVotes);
    $response->set("showEditon",$showEditon);
    $response->set("date",$date);
    $response->set("showList",$showList);


    $response->SetTemplate("creatorShows.php");
    
    return $response;
  }
}
