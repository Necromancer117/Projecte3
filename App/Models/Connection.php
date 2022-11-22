<?php

/**
 * CITA PREVIA.
 *
 * @author: marc vidal ardevol marcvidaal5@gmail.com
 *
 * model que gestiona la conexio a la base de dades.
 **/

namespace App\Models;

class Connection
{

    public $sql = null;

    public function __construct($config)
    {

        $dsn = "mysql:dbname={$config['db']};host={$config['host']}";
        $usuari = $config["user"];
        $clau = $config["pass"];

        try {
            $this->sql = new \PDO($dsn, $usuari, $clau);
        } catch (\PDOException $e) {
            die('Ha fallat la connexió: ' . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->sql;
    }
}
