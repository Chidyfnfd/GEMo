<?php
class Controlador
{
    public function verPagina($ruta)
    {
        require_once $ruta;
    }

    public function verificarLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $usuario = new Usuario(null, $email, $password);
            $gestor = new GestorUsuario();
            $datosUsuario = $gestor->busqueda($usuario);

            if ($datosUsuario) {
                // Guardar en sesión
                $_SESSION['usuario'] = $datosUsuario;
                header("Location: index.php?accion=dashboard");
                exit();
            } else {
                $error = "Credenciales incorrectas";
                require_once 'vistas/login.php';
            }
        }
    }

    public function registrarUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Valores por defecto
            $tipo_usuario = 1; // Cliente
            $emociones = json_encode(["Estrés", "Ansiedad", "Calma"]);
            $actividades = json_encode(["Trabajo", "Estudio", "Descanso"]);

            $usuario = new Usuario(null, $email, $password, $tipo_usuario, null, $emociones, $actividades);
            $gestor = new GestorUsuario();
            
            $resultado = $gestor->agregarCliente($usuario);

            if ($resultado > 0) {
                echo "<script>alert('Usuario registrado exitosamente'); window.location='index.php';</script>";
            } elseif ($resultado == -1) {
                $error = "El correo ya está registrado.";
                require_once 'vistas/registro.php';
            } else {
                $error = "Error al registrar.";
                require_once 'vistas/registro.php';
            }
        }
    }
}
?>