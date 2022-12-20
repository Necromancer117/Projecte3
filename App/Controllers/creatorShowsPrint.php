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

class creatorShowsPrint
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
    function ctrlShowsPrint($request, $response, $container)
    {
        // Comptem quantes vegades has visitat aquesta pàgina

        $error = $request->get("SESSION", "error");
        $repre = $container->get('representation');
        $id = $request->getParam("id");

        // * DONEM CONEXIO A LA BASE DE DADES
        $showConn = $container->get('show');
        // * RETORNA TOTS ELS SHOWS SEGONS EL VALOR $date
        $showList = $showConn->getAllShow();

        $title = "";
        $type = "";
        $description = "";

        foreach ($showList as $show) {
            if ($show["id_espectaculo"] == $id) {
                $title = $show["nombre_espectaculo"];
                $type = $show["tipo_espectaculo"];
                $description = $show["descripcion_espectaculo"];
            }
        }

        // ! ERRORS
        $response->set("error", $error);
        $response->setSession("error", "");

        // ? VARS
        $response->set('id', $id);
        $response->set('title', $title);
        $response->set('type', $type);
        $response->set('description', $description);

        $response->SetTemplate("creatorShowsPrint.php");

        return $response;
    }
}
