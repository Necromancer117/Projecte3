<?php

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
    // Comptem quantes vegades has visitat aquesta pàgina
<<<<<<< HEAD
    $email = $request->get(INPUT_POST, "email");
    $pass = $request->get(INPUT_POST, "pass");



    $users = $container->get('users');
    $exist = $users->exist($email, $pass);

    if ($exist) {
        $id = $users->getId($email, $pass);
        $usuario = $users->getUser($id['id_usuario']);
        $response->setSession('user', $usuario['nombre_usuario']);
        $response->setSession('id', $id['id_usuario']);
        $response->setSession('loged',true);
        switch ($usuario['usuario_rol']) {
            case 'cliente':
                $response->redirect("location: /");
                break;
            case 'creador':

                break;
            case 'administrador':

                break;

            default:
                $response->setSession('user', '');
                $response->setSession('id', '');
                $response->redirect("location: /");
                $response->setSession('loged',false);
                break;
        }
    } else {
        $response->redirect("location: /login");
        $response->setSession('error', 'The user doesn\'t exist');
    }


=======
    $usuari = $request->get(INPUT_POST, "usuari");
    $clau = $request->get(INPUT_POST, "clau");
    $config = $container->get("config");


    if ($usuari === $config["login"]["usuari"] && $clau == $config["login"]["clau"]) {
        $response->setSession("usuari", $config["login"]["usuari"]);
        $response->setSession("logat", true);
        $response->redirect("location: /privat");
    } else {
        $response->setSession("error", "Usuari o clau incorrectes!");
        $response->setSession("logat", false);
        $response->redirect("location: /login");
    }

>>>>>>> c96b473 (just pray)
    return $response;
}
