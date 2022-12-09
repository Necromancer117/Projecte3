<?php

namespace App\Controllers;

class admininsert
{

    public $contenidor;

    public function __construct($contenidor)
    {
        $this->contenidor = $contenidor;
    }
    public function ctrlAdmininsert($request, $response, $container)
    {
        $hid = $request->get(INPUT_POST, "hid");
        var_dump($hid);
        if ($hid == "user") {
            $name = $request->get(INPUT_POST, "insertusername");
            $surename = $request->get(INPUT_POST, "insertusersurename");
            $mail = $request->get(INPUT_POST, "insertusermail");
            $password = $request->get(INPUT_POST, "insertuserpassword");
            $avatar = $request->get(INPUT_POST, "insertuseravatar");
            $role = $request->get(INPUT_POST, "insertuserrole");
            $users = $container->get('users');

            $users->insertAdminUser($name, $surename, $mail, $password, $avatar, $role);
        }
        if ($hid == "editions") {
            $title = $request->get(INPUT_POST, "title");
            $start = $request->get(INPUT_POST, "StartDate");
            $end = $request->get(INPUT_POST, "EndDate");

            $edition = $container->get('edition');
            $edition->insertEdition($title, $start, $end);
        }
        if ($hid == "show") {
            $id_edition = $request->get(INPUT_POST, "edition-id");
            $name = $request->get(INPUT_POST, "Name");
            $type = $request->get(INPUT_POST, "type");
            $image = $request->get(INPUT_POST, "image");
            $description = $request->get(INPUT_POST, "description");

            $show = $container->get('show');
            $show->insertShow($id_edition, $name, $type, $image, $description);
        }
        if ($hid == "representation") {
            $showid = $request->get(INPUT_POST, "showid");
            $spaceid = $request->get(INPUT_POST, "spaceid");
            $starthour = $request->get(INPUT_POST, "starthour");
            $endhour = $request->get(INPUT_POST, "endhour");
            $date = $request->get(INPUT_POST, "date");

            $repre = $container->get('representation');
            $repre->insertRepresentation($showid, $spaceid, $starthour, $endhour, $date);
        }
        if ($hid == "location") {
            $name = $request->get(INPUT_POST, "locationname");
            $longitude = $request->get(INPUT_POST, "longitude");
            $latitude = $request->get(INPUT_POST, "latitude");

            $location = $container->get('location');
            $location->insertLocation($name, $longitude, $latitude);
        }
        $response->redirect("location: /adminpanel");
        return $response;
    }

    public function ctrlAdminUpdate($request, $response, $container)
    {
        $hid = $request->get(INPUT_POST, "hid");
        if ($hid == "user") {
            $id = $request->get(INPUT_POST, "updateuserid");
            $col = $request->get(INPUT_POST, "updateusercol");
            $newvalue = $request->get(INPUT_POST, "updateusernew");
            //var_dump($col,$newvalue,$id);
            //die;
            $users = $container->get('users');

            $users->UpdateUser($col, $newvalue, $id);
        }
        if ($hid == "editions") {
            $id = $request->get(INPUT_POST, "updateeditionid");
            $col = $request->get(INPUT_POST, "updateeditioncol");
            $newvalue = $request->get(INPUT_POST, "updateeditionnew");
            //var_dump($col,$newvalue,$id);
            //die;
            $edition = $container->get('edition');

            $edition->updateEdition($col, $newvalue, $id);
        }
        if ($hid == "show") {
            $id = $request->get(INPUT_POST, "updateshowid");
            $col = $request->get(INPUT_POST, "updateshowcol");
            $newvalue = $request->get(INPUT_POST, "updateshownew");
            //var_dump($col,$newvalue,$id);
            //die;
            $show = $container->get('show');

            $show->updateShow($col, $newvalue, $id);
        }
        if ($hid == "representation") {
            $id = $request->get(INPUT_POST, "updaterepresentationid");
            $col = $request->get(INPUT_POST, "updaterepresentationcol");
            $newvalue = $request->get(INPUT_POST, "updaterepresentationnew");
            //var_dump($col,$newvalue,$id);
            //die;
            $repre = $container->get('representation');

            $repre->updateRepresentation($col, $newvalue, $id);
        }
        if ($hid == "location") {
            $id = $request->get(INPUT_POST, "updatelocationid");
            $col = $request->get(INPUT_POST, "updatelocationcol");
            $newvalue = $request->get(INPUT_POST, "updatelocationnew");
            //var_dump($col,$newvalue,$id);
            //die;
            $location = $container->get('location');

            $location->updateLocation($col, $newvalue, $id);
        }

        $response->redirect("location: /adminpanel");
        return $response;
    }

    public function ctrlAdminDelete($request, $response, $container)
    {
        $hid = $request->get(INPUT_POST, "hid");
        if ($hid == "user") {
            $id = $request->get(INPUT_POST, "deleteuserid");
            $users = $container->get('users');
            $users->deleteUser($id);
        }
        if ($hid == "editions") {
            $id = $request->get(INPUT_POST, "deleteeditionid");
            //var_dump($id);
            //die;
            $edition = $container->get('edition');
            $edition->deleteEdition($id);
        }
        if ($hid == "show") {
            $id = $request->get(INPUT_POST, "deleteshowid");
            //var_dump($id);
            //die;
            $show = $container->get('show');
            $show->deleteShow($id);
        }
        if ($hid == "representation") {
            $id = $request->get(INPUT_POST, "deleterepresentationid");
            //var_dump($id);
            //die;
            $repre = $container->get('representation');
            $repre->deleteRepresentation($id);
        }
        if ($hid == "location") {
            $id = $request->get(INPUT_POST, "deletelocationid");
            //var_dump($id);
            //die;
            $location = $container->get('location');
            $location->deleteLocation($id);
        }
        $response->redirect("location: /adminpanel");
        return $response;
    }
}
