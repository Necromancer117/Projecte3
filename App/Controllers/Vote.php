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

        $loged = $request->get("SESSION", "loged");
        $user_id = $request->get('SESSION','id');
        $avatar=$request->get('SESSION','avatar');

        if (!isset($loged)) {
            $loged = false;
        }
        $data = [];
        $id = $request->getParam('id');
        $show = $container->get('show');
        $data['show'] = $show->getShow(1);
        
        $response->set('avatar',$avatar);
        $response->set('loged',$loged);
        $response->set('show',$data['show']);
        $response->setTemplate('vote.php');
        return $response;
    }

}