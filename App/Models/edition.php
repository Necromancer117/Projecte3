<?php

namespace App\Models;

class Edition
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

    public function insertEdition($titulo,$inicio,$fin){
        $query = 'insert into edicion (titulo_edicion, dia_inicio_edicion, dia_final_edicion) 
        values(:titulo,:inicio,:fin)';
        $stm = $this->sql->prepare($query);
        $stm->execute([':titulo' => $titulo, ':inicio' => $inicio, ':fin' => $fin]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        } 
    }

    public function getEdition($id){

        $query = 'select * from edicion where id_edicion = :id';
        $stm = $this->sql->prepare($query);
        $result = $stm->exectue([':id' => $id]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

        return $stm->fetch(\PDO::FETCH_ASSOC);
    }

    public function updateEdition($column,$newValue,$id){
        $query = 'UPDATE edicion SET ' . $column . ' = :newValue WHERE id_edicion=:id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id,':newValue' => $newValue]);
        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }
    }

    public function deleteEdition($id){

        $query = 'delte from edicion where id_edicion = :id';
        $stm = $this->sql->prepare($query);
        $stm->execute([':id' => $id]);

        if ($stm->errorCode() !== '00000') {
            $err = $stm->errorInfo();
            $code = $stm->errorCode();
            throw new Exception("Error.   {$err[0]} - {$err[1]}\n{$err[2]} $query");
        }

    }

}