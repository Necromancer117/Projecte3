<?php

namespace App\Controllers;

class Vote
{

    public $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function ctrlVote($request, $response, $container){

        $response->setTemplate('vote.php');
        return $response;
    }

}