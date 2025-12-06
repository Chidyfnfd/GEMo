<?php
class Usuario
{
    private $id;
    private $email;
    private $password;
    private $tipo_usuario;
    private $fecha_registro;
    private $emociones;
    private $actividades;

    public function __construct($id = null, $email = null, $password, $tipo_usuario = null, $fecha_registro = null, $emociones = null, $actividades = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->tipo_usuario = $tipo_usuario;
        $this->fecha_registro = $fecha_registro;
        $this->emociones = $emociones; // Se espera string JSON o Array
        $this->actividades = $actividades;
    }

    // Getters
    public function obtener_id() { return $this->id; }
    public function obtener_email() { return $this->email; }
    public function obtener_password() { return $this->password; }
    public function obtener_tipo_usuario() { return $this->tipo_usuario; }
    public function obtener_fecha_registro() { return $this->fecha_registro; }
    public function obtener_emociones() { return $this->emociones; }
    public function obtener_actividades() { return $this->actividades; }
}
?>