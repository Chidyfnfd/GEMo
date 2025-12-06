<?php
class GestorUsuario
{
    public function busqueda(Usuario $usuario)
    {
        $conexion = new Conexion();
        $enlace_conexion = $conexion->abrir();
        $email = $usuario->obtener_email();
        $password = $usuario->obtener_password();
        
        $datosUsuario = null;

        $sql = $enlace_conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $resultado = $sql->get_result()->fetch_assoc();

        if ($resultado) {
            // Verificación simple de contraseña (sin hash, según tu código original)
            if ($resultado["password"] == $password) {
                // Mapeamos los campos de la BD a un array para la sesión
                $datosUsuario = [
                    'id' => $resultado['id'],
                    'email' => $resultado['email'],
                    'tipo_usuario' => $resultado['tipo_usuario'], // 0 admin, 1 cliente
                    'emociones' => $resultado['emociones'],
                    'actividades' => $resultado['actividades']
                ];
            }
        }
        
        $conexion->cerrar();
        return $datosUsuario;
    }

    public function agregarCliente(Usuario $usuario)
    {
        $conexion = new Conexion();
        $enlaceConexion = $conexion->abrir();

        $email = $usuario->obtener_email();
        $password = $usuario->obtener_password();
        $tipo = $usuario->obtener_tipo_usuario();
        $emociones = $usuario->obtener_emociones();
        $actividades = $usuario->obtener_actividades();

        // Validar si el email ya existe
        $check = $enlaceConexion->prepare("SELECT id FROM usuarios WHERE email = ?");
        $check->bind_param("s", $email);
        $check->execute();
        if($check->get_result()->num_rows > 0){
            $conexion->cerrar();
            return -1; // Código de error: usuario existe
        }

        $sql = $enlaceConexion->prepare("INSERT INTO usuarios(email, password, tipo_usuario, emociones, actividades) VALUES (?, ?, ?, ?, ?)");
        
        $sql->bind_param("ssiss", $email, $password, $tipo, $emociones, $actividades);
        
        $exito = $sql->execute();
        $filas = $sql->affected_rows;

        $sql->close();
        $conexion->cerrar();

        return $filas;
    }
}
?>