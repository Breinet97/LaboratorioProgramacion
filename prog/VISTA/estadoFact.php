<?php
require_once '../controllers/factController.php';
require_once '../controllers/databaseController.php'; 

use App\controllers\factController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    if (isset($_POST['referencia'], $_POST['nuevoEstado'])) {
        $refencia = $_POST['referencia'];
        $nuevoEstado = $_POST['nuevoEstado'];
        
        $factController = new factController();

        if ($factController->actualizarEstadoFactura($refencia, $nuevoEstado)) {
      
            header("Location: facturasPagadas.php");
            exit;
        } else {
         
            echo 'Error al actualizar el estado de la factura. <a href="detalleFactura.php">Volver</a>';
        }
    } else {
   
        echo 'Todos los campos son requeridos. <a href="detalleFactura.php">Volver</a>';
    }
} else {
  
    echo 'Método de solicitud no válido. <a href="detalleFactura.php">Volver</a>';
}
?>
