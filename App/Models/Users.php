<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Users
{

    private $sql;

    public function __construct($config)
    {
        $dsn = "mysql:unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock;dbname=votaciones;";
        //$dsn = "mysql:dbname={$config['db']};host={$config['host']}";
        $usuari = $config["user"];
        $clau = $config["pass"];

        try {
            $this->sql = new PDO($dsn, $usuari, $clau);
        } catch (PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }

    public function insertUser($name, $surename, $mail, $password)
    { //insert user requires the datta of the register form
        $query = 'insert into usuario (nombre_usuario,apellido_usuario,mail_usuario,contrasena_usuario) 
        values (:name,:surename,:mail,:password)';
        $stm = $this->sql->prepare($query);
        $stm->execute([':name' => $name, ':surename' => $surename, ':mail' => $mail, ':password' => $password]);

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

    public function getUser($id)
    {
        $query = 'select * from usuario where id_usuario=:id;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function UpdateUser($column, $newValue, $id)
    {
        $query = 'UPDATE usuario SET ' . $column . ' = :newValue WHERE id_usuario=:id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id, ':newValue' => $newValue]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }
    public function deleteUser($id)
    {
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
