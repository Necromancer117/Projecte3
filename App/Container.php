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
    }
}
