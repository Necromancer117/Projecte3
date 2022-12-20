<?php

namespace App\Controllers;

class validarlogin
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
     * @param array $config  paràmetres de configuració de l'aplicació
     *
     **/
    function ctrlValidarLogin($request, $response, $container)
    {
        // Get mail and pass
        $email = $request->get(INPUT_POST, "email");
        $pass = $request->get(INPUT_POST, "pass");


        //Check if user exist
        $users = $container->get('users');
        $exist = $users->exist($email, $pass);


        if ($exist) {
            //If exist get info from user and open a session
            $id = $users->getId($email);
            $usuario = $users->getUser($id['id_usuario']);
            $response->setSession('user', $usuario['nombre_usuario']);
            $response->setSession('id', $id['id_usuario']);
            $response->setSession('loged', true);
            $response->setSession('avatar', $usuario['avatar_usuario']);
            //Get user rol and redirect to respective pages
            switch ($usuario['usuario_rol']) {
                case 'cliente':
                    $response->redirect("location: /");
                    break;
                case 'creador':

                    break;
                case 'administrador':
                    $response->redirect("location: /adminpanel");
                    break;

                default:
                    $response->setSession('user', '');
                    $response->setSession('id', '');
                    $response->redirect("location: /");
                    $response->setSession('loged', false);
                    break;
            }
        } else {
            //If not exist set an error and redirect to login to show error
            $response->redirect("location: /login");
            $response->setSession('error', 'The user doesn\'t exist');
        }


        return $response;
    }
}
