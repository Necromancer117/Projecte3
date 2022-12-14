<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Location
{

    private $sql;

    public function __construct($connexioDB)
    {
        $this->sql = $connexioDB->getConnection();
    }

    public function insertLocation($name, $longitude, $latitude)
    {

        $query = 'insert into espacio (nombre_espacio, longitud_espacio, latitud_espacio) values(:name,:longitude,:latitude)';
        $stm = $this->sql->prepare($query);
        $stm->execute(['name' => $name, 'longitude' => $longitude, 'latitude' => $latitude]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function getLocation($id)
    {

        $query = 'select * from espacio where id_espacio = :id';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAllLocation(){

        $query ='select * from espacio';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([]);

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

    public function updateLocation($column,$newValue,$id){

        $query = 'UPDATE espacio SET ' . $column . ' = :newValue WHERE id_espacio=:id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id,':newValue' => $newValue]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function deleteLocation($id){

        $query = 'delete from espacio where id_espacio = :id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }
}