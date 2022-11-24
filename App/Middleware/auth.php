<?php

/**
 * Middleware que gestiona l'autenticació
 *
 * @param \Emeset\Http\Request $request petició HTTP
 * @param \Emeset\Http\Response $response resposta HTTP
 * @param \Emeset\Container $container  
 * @param callable $next  següent middleware o controlador.   
 * @return \Emeset\Http\Response resposta HTTP
 */
function auth($request, $response, $container, $next)
{

    $usuari = $request->get("SESSION", "user");
    $loged = $request->get("SESSION", "loged");

    if (!isset($loged)) {
        $usuari = "";
        $loged = false;
    }

    $response->set("usuari", $usuari);
    $response->set("loged", $loged);

    // si l'usuari està logat permetem carregar el recurs
    if ($loged) {
        $response = nextMiddleware($request, $response, $container, $next);
    } else {
        $response->redirect("location: /login");
    }
    return $response;
}
