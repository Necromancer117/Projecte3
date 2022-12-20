<?php

namespace App\Controllers;

class Show
{

    public $container;
    public function __construct($container)
    {

        $this->container = $container;
    }

    public function ctrlShow($request, $response, $container)
    {
        //Get user session 
        $loged = $request->get("SESSION", "loged");
        $user_id = $request->get('SESSION','id');
        $avatar=$request->get('SESSION','avatar');
        $user = $request->get("SESSION", "user");

        if (!isset($loged)) {
            $loged = false;
        }
        $data = [];
        //Recover id of show from url
        //Get show
        $id = $request->getParam('id');
        $show = $container->get('show');
        $data['show'] = $show->getShow($id);
        $data['user_id']=$user_id;
        //Prepare data to send to template
        $representation = $container->get('representation');
        $data['mapinfo'] = $representation->getMapinfo($id);

        //Send data
        $response->set('user', $user);
        $response->set('loged', $loged);
        $response->set('loged', $loged);
        $response->set('data', $data);
        $response->set('avatar',$avatar);
        $response->setTemplate('show_info.php');



        return $response;
    }
}
