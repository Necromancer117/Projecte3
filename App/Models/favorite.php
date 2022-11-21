<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Favorite
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

    public function insertFavorite($id_user, $id_show)
    {

        $query = 'insert into favorito (id_usuario_favorito, id_espectaculo_favorito) values(:id_user,:id_show)';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id_user' => $id_user, ':id_show' => $id_show]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }
    public function getFavorite($id)
    {


        $query = 'select * from favorito where id_favorito = :id';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }





    public function deleteFavorite($id)
    {

        $query = 'delte from favorito where id_favorito = :id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }
}
