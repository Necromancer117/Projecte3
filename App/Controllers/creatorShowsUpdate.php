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

class creatorShowsUpdate
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
    function ctrlShowsUpdate($request, $response, $container)
    {

        // * DONEM CONEXIO A LA BASE DE DADES
        $showConn = $container->get('show');

        // * RECUPEREM PER POST
        $id = $_POST['id'];
        $title = $_POST['title'];
        $type = $_POST['type'];
        $description = $_POST['description'];

        // * UPDATE
        $result = $showConn->updateShow("nombre_espectaculo", $title, $id);
        $result = $showConn->updateShow("tipo_espectaculo", $type, $id);
        $result = $showConn->updateShow("descripcion_espectaculo", $description, $id);

        if ($result) {
            return 'updated';
        }

        return $response;
    }
}
