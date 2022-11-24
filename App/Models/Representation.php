<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Representation
{

    private $sql;

    public function __construct($connexioDB)
    {
        $this->sql = $connexioDB->getConnection();
    }


    public function insertRepresentation($id_show, $id_location, $time)
    {

        $query = 'insert into representacion (id_espectaculo_representacion,id_espacio_representacion,hora_inicio_representacion) 
        values(:id_show,:id_location,:time)';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id_show' => $id_show, ':id_location' => $id_location, ':time' => $time]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function getRepresentation($id)
    {

        $query = 'select * from Representacion where id_representacion = :id';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getMapinfo($id_show = false)
    {
        if ($id_show == false) {
            $query = 'select * from representacion r JOIN espacio es ON r.id_espacio_representacion=es.id_espacio where r.fecha_inicio_representacion >= NOW() GROUP BY r.id_espacio_representacion;';
            $stm = $this->sql->prepare($query);
            $stm->execute([]);
        } else {
            $query = 'select * from representacion r JOIN espacio es ON r.id_espacio_representacion=es.id_espacio where r.fecha_inicio_representacion >= NOW() && r.id_espectaculo_representacion = :id_show GROUP BY r.id_espacio_representacion;';
            $stm = $this->sql->prepare($query);
            $stm->execute([':id_show' => $id_show]);
        }


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



    public function updateRepresentation($column, $newValue, $id)
    {

        $query = 'UPDATE representacion SET ' . $column . ' = :newValue WHERE id_representacion=:id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id, ':newValue' => $newValue]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function deleteRepresentation($id)
    {

        $query = 'delete from representacion where id_representacion = :id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }
}
