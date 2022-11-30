<?php

namespace App\Controllers;

class AccountSettings
{

    public $container;
    public function __construct($container)
    {
        $this->container = $container;
    }

    public function ctrlAccountSettings($request, $response, $container)
    {


        
        $response->setTemplate('accountSettings.php');
        return $response;
    }

    public function ajaxSelector($request, $response, $container)
    {

        $selector = $request->get(INPUT_POST, 'select');

        $user_id = $request->get('SESSION', 'id');
        $response->set('result', $selector);
        $users = $container->get('users');

        switch ($selector) {
            case 'check_pass':

                $pass = $request->get(INPUT_POST, 'pass');

                $result = $users->checkPass($user_id, $pass);

                $response->set('result', $result);
                break;
            case 'update_pass':

                $pass = $request->get(INPUT_POST, 'pass');

                $users->UpdateUser('contrasena_usuario', $pass, $user_id);
                break;
            case 'update_firstname':

                $value = $request->get(INPUT_POST, 'value');
                $users->UpdateUser('nombre_usuario', $value, $user_id);
                break;
            case 'update_lastname':
                $value = $request->get(INPUT_POST, 'value');
                $users->UpdateUser('apellido_usuario', $value, $user_id);
                break;
            case 'update_mail':
                $value = $request->get(INPUT_POST, 'value');
                $users->UpdateUser('mail_usuario', $value, $user_id);
                break;

            default:

                break;
        }

        return $response;
    }

    public function upload($request, $response, $container)
    {
        $user_id=$request->get('SESSION','id');
        $data = [];

        if ($_FILES['file']) {
            $img = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            
            

            // get uploaded file's extension
            $extension = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            //generate a name 
            $final_name = date("Y-m-d_h:i:s").'.'.$extension;
            //Put all to lower case
            $final_name = strtolower($final_name);
            $img=$final_name;
            
            //Create file in server if success continue
            if (move_uploaded_file($_FILES['file']['tmp_name'],'./img/avatars/'.$img)) {
              $users = $container->get('users');
              //Update user image path
              $current_user = $users->getUser($user_id);
              //Delete previous image and update it
              unlink('./img/'.$current_user['avatar_usuario']);
              $response->setSession('avatar','avatars/'.$img);
              $users->UpdateUser('avatar_usuario','avatars/'.$img,$user_id);
              
              $response->set('image',$img);  
            };
            
            
        }

        return $response;
    }
}
