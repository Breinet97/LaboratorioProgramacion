<?php

namespace App\controllers;

use mysqli;

class DatabaseController
{
    private $host = 'localhost';
    private $user = 'root';
    private $pwd = '';
    private $db = 'facturacion_tienda_db';
    private $conex;

    function __construct()
    {
        $this->conex = new mysqli(
            $this->host,
            $this->user,
            $this->pwd,
            $this->db
        );

        if ($this->conex->connect_error) {
            die("Error de conexión: " . $this->conex->connect_error);
        }
    }

    public function execSql($sql)
    {
        $result = $this->conex->query($sql);

        if (!$result) {
            die("Error en la consulta: " . $this->conex->error);
        }

        return $result;
    }

    function close()
    {
        $this->conex->close();
    }

    function __destruct()
    {
        $this->close();
    }
}
?>
