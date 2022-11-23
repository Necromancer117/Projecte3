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

        $id = $request->getParam('id');
        $show = $container->get('show');
        $data = $show->getShow($id);

        $response->set('loged',$loged);
        $response->set('show', $data);
        $response->setTemplate('show_info.php');
        return $response;
    }
}
