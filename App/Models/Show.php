<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Show
{

    private $sql;

    public function __construct($connexioDB)
    {
        $this->sql = $connexioDB->getConnection();
    }

    public function insertShow($id_edition,$name,$type,$image,$description){

        $query = 'insert into espectaculo (id_edicion_espectaculo, nombre_espectaculo, tipo_espectaculo , imagen_espectaculo,descripcion_espectaculo) 
        values(:id_edition,:name,:type,:image,:description)';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id_edition' => $id_edition, ':name' => $name, ':type' => $type, ':image' => $image,':description' => $description]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function getShow($id)
    {
        $query = 'select * from espectaculo e where e.id_espectaculo = :id';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Devuelve todos los shows de la edicion corriente o mas cercana
     */
    public function getShows()
    {
        $query = 'SELECT * FROM espectaculo e JOIN edicion ed ON e.id_edicion_espectaculo=ed.id_edicion WHERE ed.dia_final_edicion>=CURDATE() && ed.dia_final_edicion > ed.dia_inicio_edicion';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute();
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        $shows = [];


        while ($show = $stm->fetch(PDO::FETCH_ASSOC)) {
            $shows[] = $show;
        }
        return $shows;
    }

    public function getAllShow(){
        $query = 'select * from espectaculo';
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

    public function updateShow($column,$newValue,$id){
        $query = 'UPDATE espectaculo SET ' . $column . ' = :newValue WHERE id_espectaculo=:id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id,':newValue' => $newValue]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function deleteShow($id){
        $query = 'delete from espectaculo where id_espectaculo = :id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }    

    public function getCreatorShows($edicion){
        $query = 'SELECT e.id_espectaculo, e.nombre_espectaculo, e.tipo_espectaculo, e.imagen_espectaculo, e.descripcion_espectaculo, ed.titulo_edicion FROM espectaculo e JOIN edicion ed ON e.id_edicion_espectaculo=ed.id_edicion WHERE YEAR(ed.dia_inicio_edicion) = :edicion;';
        $stm = $this->sql->prepare($query);
        $stm->execute([':edicion' => $edicion]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        $results = [];

        while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $result;
        }

        return $results;
    }
    
    public function getEdicion(){
        $query = 'SELECT * FROM edicion ORDER BY dia_inicio_edicion;';
        $stm = $this->sql->prepare($query);
        $stm->execute();
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
        $results = [];

        while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
            $results[] = $result;
        }

        return $results;
    }



}
