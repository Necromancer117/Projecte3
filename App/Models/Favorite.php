<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Favorite
{

    private $sql;

    public function __construct($connexioDB)
    {
        $this->sql = $connexioDB->getConnection();
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





    public function deleteFavorite($id_user, $id_show)
    {

        $query = 'delete from favorito where id_usuario_favorito = :id_user AND id_espectaculo_favorito = :id_show';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id_user' => $id_user,':id_show'=>$id_show]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }
}
