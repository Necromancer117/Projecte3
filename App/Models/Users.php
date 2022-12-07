<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Users
{

    private $sql = null;

    public function __construct($connexioDB)
    {
        $this->sql = $connexioDB->getConnection();
    }

    

    public function insertUser($name,$surename,$mail,$password,$avatar){//insert user requires the datta of the register form
        $query = 'insert into usuario (nombre_usuario,apellido_usuario,mail_usuario,contrasena_usuario,avatar_usuario) 
        values (:name,:surename,:mail,:password,:avatar)';
        $stm = $this->sql->prepare($query);
        $stm->execute([':name' => $name, ':surename' => $surename, ':mail' => $mail, ':password' => $password, ':avatar' => $avatar]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    /**
     * Devuelve la id del usuario
     */
    public function getId($mail, $pass)
    {

        $query = 'select id_usuario from usuario where :mail = mail_usuario && :pass = contrasena_usuario;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':mail' => $mail, ':pass' => $pass]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
    public function insertAdminUser($name,$surename,$mail,$password,$avatar,$role){//insert user requires the datta of the register form
        $query = 'insert into usuario (nombre_usuario,apellido_usuario,mail_usuario,contrasena_usuario,avatar_usuario,usuario_rol) 
        values (:name,:surename,:mail,:password,:avatar,:role)';
        $stm = $this->sql->prepare($query);
        $stm->execute([':name' => $name, ':surename' => $surename, ':mail' => $mail, ':password' => $password, ':avatar' => $avatar, ':role' =>$role]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function getUser($id)
    {
        $query = 'select * from usuario where id_usuario=:id;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }//
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllUsers()
    {
        $query = 'select * from usuario';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        
        $datas = [];

        while ($data = $stm->fetch(PDO::FETCH_ASSOC)) {
            $datas[] = $data;
        }

        return $datas;
    }

    public function UpdateUser($column,$newValue,$id){
        $query = 'UPDATE usuario SET ' . $column . ' = :newValue WHERE id_usuario=:id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id,':newValue' => $newValue]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }
    public function deleteUser($id){
        $query = 'delete from usuario where id_usuario = :id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    /**
     * Devuelve true o false si el usuario existe
     */
    public function exist($mail, $pass)
    {

        $query = 'select * from usuario where :mail = mail_usuario && :pass = contrasena_usuario;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':mail' => $mail, ':pass' => $pass]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        if ($stm->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
