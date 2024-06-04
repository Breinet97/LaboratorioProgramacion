<?php

namespace App\controllers;

use App\models\DetalleFactura;
use App\controllers\databaseController;

class detFactController
{
    public function read()
    {
        $database = new databaseController();
        $sql = "SELECT * FROM detallefacturas";
        $result = $database->execSql($sql);
        $detalleFacturas = [];
        if ($result->num_rows == 0) {
            return $detalleFacturas;
        }
        while ($item = $result->fetch_assoc()) {
            $detalleFactura = new DetalleFactura();
            $detalleFactura->set('cantidad', $item['cantidad']);
            $detalleFactura->set('precioUnitario', $item['precioUnitario']);
            $detalleFactura->set('idArticulo', $item['idArticulo']);
            $detalleFactura->set('referenciaFactura', $item['referenciaFactura']);
            array_push($detalleFacturas, $detalleFactura);
        }
        $database->close();
        return $detalleFacturas;
    }

    public function crear($detalleFactura)
    {
        $sql = "INSERT INTO detallefacturas (cantidad, precioUnitario, idArticulo, referenciaFactura ) VALUES (";
        $sql .= "'" . $detalleFactura->get('cantidad') . "',";
        $sql .= "'" . $detalleFactura->get('precioUnitario') . "',";
        $sql .= "'" . $detalleFactura->get('idArticulo') . "',";
        $sql .= "'" . $detalleFactura->get('referenciaFactura') . "'";
        $sql .= ")";
        $database = new databaseController();
        $result = $database->execSql($sql);
        $database->close();
        return $result;
    }
}
?>
