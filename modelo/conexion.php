<?php
class Conexion
{
    private $host = "localhost";
    private $db = "basededatosgemo";
    private $user = "root";
    private $pass = "";
    private $conexion;

    public function abrir()
    {
        $this->conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->conexion) {
            die("Conexión fallida: " . mysqli_connect_error());
        }
        // Establecer charset para evitar problemas con tildes
        mysqli_set_charset($this->conexion, "utf8");
        return $this->conexion;
    }

    public function cerrar()
    {
        if ($this->conexion) {
            mysqli_close($this->conexion);
            $this->conexion = null;
        }
    }
}
?>