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
    $email = $request->get(INPUT_POST, "email");
    $pass = $request->get(INPUT_POST, "pass");



    $users = $container->get('users');
    $exist = $users->exist($email, $pass);

    if ($exist) {
        $id = $users->getId($email, $pass);
        $usuario = $users->getUser($id['id_usuario']);
        $response->setSession('user',$usuario['nombre_usuario']);
        $response->setSession('id',$id['id_usuario']);
        switch ($usuario['usuario_rol']) {
            case 'cliente':
                
                break;
            case 'creador':
                
                break;
            case 'administrador':
                
                break;

            default:
            $response->redirect("location: ");
                break;
        }
    }else {
        $response->redirect("location: /login");
        $response->setSession('error','The user doesn\'t exist');
    }


    return $response;
}
