<?php

namespace App\Controllers;

class adminpanel
{

    public $contenidor;

    public function __construct($contenidor)
    {
        $this->contenidor = $contenidor;
    }
    public function ctrlAdminpanel($request, $response, $container)
    {
        
        $users = $container->get('users');
        $list=$users->getAllUsers();
        
        $edition = $container->get('edition');
        $editionList = $edition->getAllEdition();
        
        $show = $container->get('show');
        $showList = $show->getAllShow();

        //VOTE SECTION
        $vote = $container->get('vote');


        $curShows = $show -> getShows();
        $dataVotes = [];

        foreach ($curShows as $show) {
           $res= $vote -> getAvgVote($show['id_espectaculo']);
           
           if (is_null($res['votos'])){
            $res['votos']=0;
           }
            $dataVotes [$show['nombre_espectaculo']] = floatval($res['votos']);  
        }
        
        
        //END VOTE SECTION

        $repre = $container->get('representation');
        $repreList = $repre->getAllRepresentation();
        
        $location = $container->get('location');
        $locationList = $location->getAllLocation();
        
        // var_dump($dataVotes);
        // die;
        $response->set('dataVotes',$dataVotes);
        $response->set("list",$list);
        $response->set("editionList",$editionList);
        $response->set("showList",$showList);
        $response->set("repreList",$repreList);
        $response->set("locationList",$locationList);
        $response->SetTemplate("adminpanel.php");
        return $response;
    }
}
