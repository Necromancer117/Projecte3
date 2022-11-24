<?php


namespace App;

use Emeset\Container as EmesetContainer;


class Container extends EmesetContainer {
//$config para enviar los datos de bd    
public $config = [];

    public function __construct($config){
        parent::__construct($config);
        $this->config=$config;
        
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
        $this["\App\Controllers\Login"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Login($c);
        };
        ////////////////////////////////
        /////////////MODELOS////////////
        ////////////////////////////////

        /* this 'nombre de funcion'para poder llamarlo despues ej. $repre=$controller->get('representation') */
        $this["representation"] = function ($c) {
            return new \App\Models\Representation($this->config['database']);
        };
        $this["users"] = function ($c) {
            return new \App\Models\users($this->config['database']);
        };
    }
}