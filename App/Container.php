<?php


namespace App;

use Emeset\Container as EmesetContainer;


class Container extends EmesetContainer
{
    //$config para enviar los datos de bd    
    public $config = [];

    public function __construct($config)
    {
        parent::__construct($config);
        $this->config = $config;

        ////////////////////////////////
        /////////CONTROLADORES//////////
        ////////////////////////////////
        $this["\App\Controllers\Portada"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Portada($c);
        };
        $this["\App\Controllers\Privat"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Privat($c);
        };
        $this["\App\Controllers\Login"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Login($c);
        };
        $this["\App\Controllers\Signup"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Signup($c);
        };
        $this["\App\Controllers\AccountSettings"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\AccountSettings($c);
        };
        $this["\App\Controllers\Favorites"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Favorites($c);
        };
        $this["\App\Controllers\Vote"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Vote($c);
        };
        $this["\App\Controllers\adminpanel"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\adminpanel($c);
        };
        $this["\App\Controllers\admininsert"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\admininsert($c);
        };
        $this["\App\Controllers\creatorShows"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\creatorShows($c);
        };
        ////////////////////////////////
        /////////////MODELOS////////////
        ////////////////////////////////

        // * GENERAL CONNECTRION TO DATABASE
        $this["connection"] = function ($c) {
            return new \App\Models\Connection($this->config['database']);
        };

        // * MODIFYERS
        $this["edition"] = function ($c) {
            return new \App\Models\Edition($c["connection"]);
        };

        // * FAVORITES
        $this["favorite"] = function ($c) {
            return new \App\Models\Favorite($c["connection"]);
        };

        // * LOCATION
        $this["location"] = function ($c) {
            return new \App\Models\Location($c["connection"]);
        };

        // * REPRESENTATIONS
        $this["representation"] = function ($c) {
            return new \App\Models\Representation($c["connection"]);
        };

        // * SHOW
        $this["show"] = function ($c) {
            return new \App\Models\Show($c["connection"]);
        };

        // * USERS
        $this["users"] = function ($c) {
            return new \App\Models\Users($c["connection"]);
        };

        // * VOTE
        $this["vote"] = function ($c) {
            return new \App\Models\Vote($c["connection"]);
        };
        // * MESSAGE
        $this["message"] = function ($c) {
            return new \App\Models\Message($c["connection"]);
        };
    }
}
