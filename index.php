<?php
// index.php
session_start();

// Importar modelos
require_once 'modelo/conexion.php';
require_once 'modelo/usuario.php';
require_once 'modelo/gestor_usuario.php';
require_once 'controlador/controlador.php';

$controlador = new Controlador();

// Manejo de rutas simple
if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    
    switch ($accion) {
        case 'login':
            $controlador->verificarLogin();
            break;
        case 'registro':
            $controlador->registrarUsuario();
            break;
        case 'form_registro':
            $controlador->verPagina('vistas/registro.php');
            break;
        case 'dashboard':
            // Solo entra si hay sesión
            if (isset($_SESSION['usuario'])) {
                $controlador->verPagina('vistas/app.php');
            } else {
                header("Location: index.php");
            }
            break;
        case 'logout':
            session_destroy();
            header("Location: index.php");
            break;
        default:
            $controlador->verPagina('vistas/login.php');
            break;
    }
} else {
    // Si ya está logueado, ir al dashboard, sino al login
    if (isset($_SESSION['usuario'])) {
        header("Location: index.php?accion=dashboard");
    } else {
        $controlador->verPagina('vistas/login.php');
    }
}
?>