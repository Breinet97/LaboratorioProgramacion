<?php
require_once '../models/Model.php';
require_once '../models/DetalleFactura.php';
require_once '../controllers/detFactController.php';
require_once '../controllers/databaseController.php';
require_once '../controllers/artController.php'; 

use App\controllers\detFactController;
use App\models\DetalleFactura;
use App\controllers\artController; 

$controller = new detFactController();
$detalleFactura = new DetalleFactura();
$artController = new artController(); 

$precioUnitario = null;
$referenciaFactura = null;

if(isset($_POST['idArticulo'], $_POST['cantidad'], $_POST['refenciaFactura'])) {
    $articulos = $artController->read(); 

    foreach ($articulos as $articulo) { 
        if($articulo->get('id') == $_POST['idArticulo']) {
            $precioUnitario = $articulo->get('precio');
        }
    }

    $detalleFactura->set('cantidad', $_POST['cantidad']);
    $detalleFactura->set('precioUnitario', $precioUnitario);
    $detalleFactura->set('idArticulo', $_POST['idArticulo']);
    $detalleFactura->set('referenciaFactura', $_POST['refenciaFactura']);

    $result = $controller->crear($detalleFactura);
} else {
    $result = false;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Guardado</title>
</head>
<body>
    <h1><?php echo $result ? 'Detalle de factura guardado correctamente' : 'Hubo un error al guardar el detalle de la factura'; ?></h1>
    <br>
    <?php if ($result): ?>
        <ul>
            <li><strong>Cantidad:</strong> <?php echo $detalleFactura->get('cantidad'); ?></li>
            <li><strong>Precio Unitario:</strong> <?php echo $detalleFactura->get('precioUnitario'); ?></li>
            <li><strong>ID Artículo:</strong> <?php echo $detalleFactura->get('idArticulo'); ?></li>
            <li><strong>Referencia de Factura:</strong> <?php echo $detalleFactura->get('referenciaFactura'); ?></li>
        </ul>
    <?php endif; ?>
    <br>
    <a href="../vista/pestDetFac.php">Agregar más productos a la factura</a><br>
    <a href="pestFac.php">Volver</a>
</body>
</html>
