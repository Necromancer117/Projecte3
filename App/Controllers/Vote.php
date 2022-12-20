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

        //Get session if user is loged
        $loged = $request->get("SESSION", "loged");
        $user_id = $request->get('SESSION','id');
        $avatar=$request->get('SESSION','avatar');

        if (!isset($loged)) {
            $loged = false;
        }
        $data = [];

        //Get id of show and get info from this
        $id = $request->getParam('id');
        $show = $container->get('show');
        $data['show'] = $show->getShow(1);
        
        
        //Send data to template
        $response->set('avatar',$avatar);
        $response->set('loged',$loged);
        $response->set('show',$data['show']);
        $response->setTemplate('vote.php');
        return $response;
    }
    public function sendVote($request, $response, $container){

        //Get the points fro the vote and id from show
        $rate = $request->get(INPUT_POST,'rate');
        $id_show = $request->get(INPUT_POST,'id_show');
        $vote = $container->get('vote');
        
        if ($vote->insertVote($id_show,$rate)) {
            $response->set('query',true);
        } else{
            $response->set('query',false);
        }
        return $response;

    }

}