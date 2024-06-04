<?php

namespace App\controllers;

require_once '../models/Articulo.php'; 
require_once 'databaseController.php';

use App\models\Articulo;
use App\controllers\DatabaseController;

class ArtController
{
    /**
     * Lee todos los artículos de la base de datos.
     *
     * @return array Arreglo de objetos Articulo.
     */
    public function read()
    {
        $database = new DatabaseController();
        $sql = "SELECT * FROM articulos";
        $result = $database->execSql($sql);

        $articulos = [];

        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $articulo = new Articulo();
                $articulo->set('id', $item['id']);
                $articulo->set('nombre', $item['nombre']);
                $articulo->set('precio', $item['precio']);
                $articulos[] = $articulo;
            }
        }

        $database->close();

        return $articulos;
    }
}
?>
