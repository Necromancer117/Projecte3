<?php

namespace App\Models;
use PDO;
use PDOException;
use FFI\Exception;
class Representation
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
   

    public function insertRepresentation($showid,$spaceid,$starthour,$endhour,$date){
       
        $query = 'insert into representacion (id_espectaculo_representacion,id_espacio_representacion,hora_inicio_representacion,hora_fin_representacion,fecha_inicio_representacion) 
        values(:showid,:spaceid,:starthour,:endhour,:date)';
        $stm = $this->sql->prepare($query);
        $stm->execute([':showid' => $showid, ':spaceid' => $spaceid, ':starthour' => $starthour, ':endhour' => $endhour, ':date' => $date]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

    }

    public function getRepresentation($id){

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

    public function getAllRepresentation(){

        $query = 'select * from Representacion';
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

    public function updateRepresentation($column,$newValue,$id){

        $query = 'UPDATE representacion SET ' . $column . ' = :newValue WHERE id_representacion=:id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id,':newValue' => $newValue]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

    }

    public function deleteRepresentation($id){

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