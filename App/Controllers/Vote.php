<?php

namespace App\Controllers;

use DateTime;

class Vote
{

    public $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function ctrlVote($request, $response, $container)
    {
        

        if (!isset($_COOKIE['voted'])) {
            $voted = false;
        }else{
            $voted = $_COOKIE['voted'];
        }

        
        //Get session if user is loged
        $loged = $request->get("SESSION", "loged");
        $user_id = $request->get('SESSION', 'id');
        $avatar = $request->get('SESSION', 'avatar');

        if (!isset($loged)) {
            $loged = false;
        }
        $data = [];

        //Get id of show and get info from this
        $id = $request->getParam('id');
        $show = $container->get('show');
        $data['show'] = $show->getShow(1);


        //Send data to template
        $response->set('voted',$voted);
        $response->set('avatar', $avatar);
        $response->set('loged', $loged);
        $response->set('show', $data['show']);
        $response->setTemplate('vote.php');
        return $response;
    }
    public function sendVote($request, $response, $container)
    {

        $edition = $container->get('edition');
        $ed = $edition->getCurrentEdition();

        $start = date_create();
        $end = date_create($ed['dia_final_edicion']);

        $diffInSeconds = $end->getTimestamp() - $start->getTimestamp();
        
        
        //Create a cookie who expires at the end of the current or nearest edition
        $response->setCookie('voted',true,time()+$diffInSeconds);
        //Get the points fro the vote and id from show
        $rate = $request->get(INPUT_POST, 'rate');
        $id_show = $request->get(INPUT_POST, 'id_show');
        $vote = $container->get('vote');

        if ($vote->insertVote($id_show, $rate)) {
            $response->set('query', true);
        } else {
            $response->set('query', false);
        }
        return $response;
    }
}
