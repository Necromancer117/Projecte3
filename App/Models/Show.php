<?php

namespace App\Models;

use PDO;
use PDOException;
use FFI\Exception;

class Show
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

    public function insertShow($id_edition, $name, $type, $image)
    {

        $query = 'insert into espectaculo (id_edicion_espectaculo, nombre_espectaculo, tipo_espectaculo , imagen_espectaculo) 
        values(:id_edition,:name,:type,:image)';
        $stm = $this->sql->prepare($query);
        $result = $stm->execute([':id_edition' => $id_edition, ':name' => $name, ':type' => $type, ':image' => $image]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function getShow($id)
    {
        $query = 'select * from espectaculo where id_espectaculo = :id';
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

    public function updateShow($column, $newValue, $id)
    {
        $query = 'UPDATE espectaculo SET ' . $column . ' = :newValue WHERE id_espectaculo=:id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id, ':newValue' => $newValue]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function deleteShow($id)
    {
        $query = 'delete from espectaculo where id_espectaculo = :id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }
}
