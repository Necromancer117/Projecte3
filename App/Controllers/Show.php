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

        if (!isset($loged)) {
            $loged = false;
        }
        $data = [];
        $id = $request->getParam('id');
        $show = $container->get('show');
        $data['show'] = $show->getShow($id);

        $representation = $container->get('representation');
        $data['mapinfo'] = $representation->getMapinfo($id);

        $response->set('loged', $loged);
        $response->set('data', $data);
        $response->setTemplate('show_info.php');



        return $response;
    }
}
