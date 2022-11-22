<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Vote
{

    private $sql;

    public function __construct($connexioDB)
    {
        $this->sql = $connexioDB->getConnection();
    }

    public function insertVote($id, $valoration)
    {

        $query = 'insert into voto (id_espectaculo_voto,valoracion_voto) values (:id,:valoration)';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id, ':valoration' => $valoration]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function getAvgVote($id)
    {

        $query = 'select avg(valoracion_voto) from voto where id_espectaculo_voto=:id';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }
}
