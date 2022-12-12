<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Message
{

    private $sql;

    public function __construct($connexioDB)
    {
        $this->sql = $connexioDB->getConnection();
    }

    public function addMessage($id_user,$type,$message){

        $query = 'insert into mensajes (id_usuario_mensaje,tipo_mensaje,contenido_mensaje) values(:id_user,:type,:message)';
        $stm = $this->sql->prepare($query);

        if ($stm->execute([':id_user' => $id_user, ':type' => $type, ':message'=>$message])) {
            return true;
        }else {
            return false;
        }
        

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

}