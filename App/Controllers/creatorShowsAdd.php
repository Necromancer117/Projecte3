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

class creatorShowsAdd
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
    function ctrlShowsAdd($request, $response, $container)
    {

        // * DONEM CONEXIO A LA BASE DE DADES
        $showConn = $container->get('show');

        // * RECUPEREM PER POST
        $title = $_POST['title'];
        $type = $_POST['type'];
        $description = $_POST['description'];
        $img = $_POST['img'];


        // * ADD
        $result = $showConn->insertShow("id_edition", $title, $type, $img, $description);

        if ($result) {
            return 'updated';
        }

        return $response;
    }

    // ! UNDONE Section to upload image to server
    public function ctrlShowsAddUpload($request, $response, $container)
    {
        $data = [];

        if ($_FILES['file']) {
            $img = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];



            // get uploaded file's extension
            $extension = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            //generate a name 
            $final_name = date("Y-m-d_h:i:s") . '.' . $extension;
            $final_name = str_replace(":", "_", $final_name);
            //Put all to lower case
            $final_name = strtolower($final_name);
            $img = $final_name;

            //Create file in server if success continue
            if (move_uploaded_file($_FILES['file']['tmp_name'], './img/shows/' . $img)) {

                $response->set('image', $img);
            };
        }

        return $response;
    }
}
