<?php
namespace App\controllers; 

use mysqli;

class ControladorUser
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
    }

    function validarUsuario($usuario, $password)
    {
        // Sanitizar entrada de usuario
        $usuario = $this->conex->real_escape_string($usuario);
        $password = $this->conex->real_escape_string($password);

        // Consulta preparada para prevenir inyección SQL
        $stmt = $this->conex->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            if (password_verify($password, $user['pwd'])) {
                // Usuario válido
                return true;
            }
        }
        
        // Usuario inválido
        return false;
    }

    function close()
    {
        $this->conex->close();
    }
}


$controlador = new ControladorUser();


if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario']; 
    $password = $_POST['password']; 

    if ($controlador->validarUsuario($usuario, $password)) {
        
        header("Location: pestFac.php");
        exit;
    } else {
        
        header("Location: valUser.php");
        exit;
    }
}
?>
