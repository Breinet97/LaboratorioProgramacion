<?php

namespace App\controllers;

use App\models\Cliente;
use App\controllers\DatabaseController;

class ClientController
{
    public function read()
    {
        $database = new DatabaseController();
        $sql = "SELECT * FROM clientes";
        $result = $database->execSql($sql);
        $clientes = [];
        
        if ($result !== false && $result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $cliente = new Cliente();
                $cliente->set('id', $item['id']);
                $cliente->set('nombreCompleto', $item['nombreCompleto']);
                $cliente->set('tipoDocumento', $item['tipoDocumento']);
                $cliente->set('numeroDocumento', $item['numeroDocumento']);
                $cliente->set('email', $item['email']);
                $cliente->set('telefono', $item['telefono']);
                $clientes[] = $cliente;
            }
        }
        
        $database->close();
        return $clientes;
    }

    public function create($cliente)
    {
        $sql = "INSERT INTO clientes (nombreCompleto, tipoDocumento, numeroDocumento, email, telefono) VALUES (";
        $sql .= "'" . $cliente->get('nombreCompleto') . "',";
        $sql .= "'" . $cliente->get('tipoDocumento') . "',";
        $sql .= "'" . $cliente->get('numeroDocumento') . "',";
        $sql .= "'" . $cliente->get('email') . "',";
        $sql .= "'" . $cliente->get('telefono') . "'";
        $sql .= ")";
        
        $database = new DatabaseController();
        $result = $database->execSql($sql);
        $database->close();
        
        return $result;
    }

    public function update($cliente)
    {
        $sql = "UPDATE clientes SET ";
        $sql .= "nombreCompleto = '" . $cliente->get('nombreCompleto') . "', ";
        $sql .= "tipoDocumento = '" . $cliente->get('tipoDocumento') . "', ";
        $sql .= "email = '" . $cliente->get('email') . "', ";
        $sql .= "telefono = '" . $cliente->get('telefono') . "' ";
        $sql .= "WHERE numeroDocumento = '" . $cliente->get('numeroDocumento') . "'";
        
        $database = new DatabaseController();
        $result = $database->execSql($sql);
        $database->close();
        
        return $result;
    }

    public function delete($numeroDocumento)
    {
        $sql = "DELETE FROM clientes WHERE numeroDocumento = '" . $numeroDocumento . "'";

        $database = new DatabaseController();
        $result = $database->execSql($sql);
        $database->close();
        
        return $result;
    }
}
