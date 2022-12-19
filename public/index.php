<?php

/**
 * Front controler
 * Exemple de MVC per a M07 Desenvolupament d'aplicacions web en entorn de servidor.
 * Aquest Framework implementa el mínim per tenir un MVC per fer pràctiques
 * de M07.
 * @author: Dani Prados dprados@cendrassos.net
 * @version 0.1.5
 *
 * Punt d'netrada de l'aplicació exemple del Framework Emeset.
 * Per provar com funciona es pot executer php -S localhost:8000 a la carpeta public.
 * I amb el navegador visitar la url http://localhost:8000/
 *
 */
ini_set('display_errors',0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "../vendor/autoload.php";
include "../App/config.php";

//include "../App/Controllers/portada.php";
include "../App/Controllers/error.php";
//include "../App/Controllers/login.php";
include "../App/Controllers/validarlogin.php";
//include "../App/Controllers/privat.php";
include "../App/Controllers/tancarSessio.php";
include "../App/Middleware/auth.php";
include "../App/Middleware/test.php";


/* Creem els diferents models */
$contenidor = new \App\Container($config);

$app = new \Emeset\Emeset($contenidor);


$app->route("", "\App\Controllers\Portada:ctrlPortada");
//$app->route("/login", "ctrlLogin");
$app->route("/login", "\App\Controllers\login:ctrlLogin");
$app->route("validarLogin", "ctrlValidarLogin");
$app->route("/account/settings", "\App\Controllers\AccountSettings:ctrlAccountSettings", ["auth"]);
$app->route("tancar-sessio", "ctrlTancarSessio", ["auth"]);
$app->route("/show/id={id}", "\App\Controllers\Show:ctrlShow");
$app->route("/signup", "ctrlInserUser");
$app->route("createUser", "\App\Controllers\Signup:ctrlInsertUser");
$app->route("/signup", "\App\Controllers\login:ctrlSignup");
$app->route("/vote", "\App\Controllers\Vote:ctrlVote");
$app->route("/user/favorites", "\App\Controllers\Favorites:ctrlMyfavorites", ["auth"]);

$app->route("/adminpanel", "\App\Controllers\adminpanel:ctrlAdminpanel", ["auth"]);
$app->route("/admininsert", "\App\Controllers\admininsert:ctrlAdmininsert");
$app->route("/adminupdate", "\App\Controllers\admininsert:ctrlAdminUpdate");
$app->route("/adminDelete", "\App\Controllers\admininsert:ctrlAdminDelete");

$app->route("/crator", "\App\Controllers\creator:ctrlCreator");

///////////////////////////////////
/////////*AJAX CONTROLLERS*////////
///////////////////////////////////

$app->route("/account/settings/check", "\App\Controllers\AccountSettings:ajaxSelector", ["auth"]);
$app->route("/account/settings/upload", "\App\Controllers\AccountSettings:upload", ["auth"]);
$app->route('/favorites','\App\Controllers\Favorites:addFavorite',['auth']);
$app->route('/sendVote','\App\Controllers\Vote:sendVote');
$app->route('/sendMessage','\App\Controllers\Portada:sendMessage');

$app->route("/hola/{id}", function ($request, $response) {
    $id = $request->getParam("id");
    $response->setBody("Hola {$id}!");
    return $response;
});

$app->route(\Emeset\Routers\Router::DEFAULT_ROUTE, "ctrlError");

$app->execute();
