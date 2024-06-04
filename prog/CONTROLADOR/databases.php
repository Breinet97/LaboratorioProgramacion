<?php
class Databases {
    private $host;
    private $user;
    private $pwd;
    private $datab;
    private $conn;

    public function __construct($host, $user, $pwd, $datab) {
        $this->host = $host;
        $this->user = $user;
        $this->pwd = $pwd;
        $this->datab = $datab;
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pwd, $this->datab);
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function close() {
        if ($this->conn !== null) {
            $this->conn->close();
            $this->conn = null;
        }
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        if (!$result) {
            die("Error en la consulta: " . $this->conn->error);
        }
        return $result;
    }

    public function escape_string($string) {
        return $this->conn->real_escape_string($string);
    }
}
?>
