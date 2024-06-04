<?php

namespace App\controllers;

use App\models\Factura;
use App\controllers\databaseController;


class FactController
{
    private $dbController;

    public function __construct()
    {
        $this->dbController = new databaseController();
    }
    
   
    public function getFacturas()
    {
        $sql = "SELECT * FROM facturas";
        $result = $this->dbController->execSql($sql);
        $facturas = [];
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $factura = new Factura();
                $factura->set('referencia', $item['referencia']);
                $factura->set('fecha', $item['fecha']);
                $factura->set('idCliente', $item['idCliente']);
                $factura->set('estado', $item['estado']);
                $factura->set('descuento', $item['descuento']);
                $facturas[] = $factura;
            }
        }
        $this->dbController->close();
        return $facturas;
    }

    public function guardarFactura($factura)
    {
        $sql = "INSERT INTO facturas (referencia, fecha, idCliente, estado, descuento) VALUES (";
        $sql .= "'" . $factura->get('referencia') . "',";
        $sql .= "'" . $factura->get('fecha') . "',";
        $sql .= ($factura->get('idCliente') != '') ? "'" . $factura->get('idCliente') . "'," : "NULL,";
        $sql .= "'" . $factura->get('estado') . "',";
        $sql .= "'" . $factura->get('descuento') . "'";
        $sql .= ")";
        $result = $this->dbController->execSql($sql);
        $this->dbController->close();
        return $result;
    }

    public function getCount()
    {
        $result = $this->dbController->execSql("SELECT COUNT(*) as total FROM facturas");
        $row = $result->fetch_assoc();
        return $row['total'];
    }

   
    public function actualizarEstadoFactura($referencia, $nuevoEstado)
    {
        $sql = "UPDATE facturas SET estado = '$nuevoEstado' WHERE referencia = '$referencia'";
        $result = $this->dbController->execSql($sql);
        $this->dbController->close();
        return $result;
    }
}

?>
