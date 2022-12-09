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

        $loged = $request->get("SESSION", "loged");
        $user_id = $request->get('SESSION','id');
        $avatar=$request->get('SESSION','avatar');

        if (!isset($loged)) {
            $loged = false;
        }
        $data = [];
        $id = $request->getParam('id');
        $show = $container->get('show');
        $data['show'] = $show->getShow($id);
        $data['user_id']=$user_id;

        $representation = $container->get('representation');
        $data['mapinfo'] = $representation->getMapinfo($id);

        $response->set('loged', $loged);
        $response->set('data', $data);
        $response->set('avatar',$avatar);
        $response->setTemplate('show_info.php');



        return $response;
    }
}
