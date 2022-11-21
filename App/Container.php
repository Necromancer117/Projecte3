<?php


namespace App;

use Emeset\Container as EmesetContainer;


class Container extends EmesetContainer {
public $config = [];

    public function __construct($config){
        parent::__construct($config);
        $this->config=$config;
        

        
        $this["\App\Controllers\Privat"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Privat($c);
        };
        $this["\App\Controllers\Login"] = function ($c) {
            // Aqui podem inicialitzar totes les dependències del controlador i passar-les com a paràmetre.
            return new \App\Controllers\Login($c);
        };
        /* Podem definir com s’han d’instanciar els diferents models. */
        $this["representation"] = function ($c) {
            return new \App\Models\Representation($this->config['database']);
        };
    }
}