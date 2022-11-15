<?php

class Users
{

    private $sql;

    public function __construct($config)
    {
        $dsn = "mysql:dbname={$config['db']};host={$config['host']}";
        $usuari = $config["user"];
        $clau = $config["pass"];
        
        try {
            $this->sql = new PDO($dsn, $usuari, $clau);
        } catch (PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }

    public function insertUser($name,$surename,$mail,$password,$avatar){//insert user requires the datta of the register form
        $query = 'insert into users (nombre_usuario,apellido_usuario,mail_usuario,contrasena_usuario,avatar_usuario) 
        values (:name,:surename,:mail,:password,:avatar)';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':name' => $name, ':surename' => $surename, ':mail' => $mail, ':password' => $password, ':avatar' => $avatar]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function getUser($user)
    {
        $query = 'select * from usuario where nombre_usuario=:user;';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':user' => $user]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

}