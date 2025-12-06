<?php
// Asegurar que solo se accede logueado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
// Preparamos los datos del usuario para JS
$userJson = json_encode([
    'id' => $_SESSION['usuario']['id'],
    'email' => $_SESSION['usuario']['email'],
    'type' => $_SESSION['usuario']['tipo_usuario'],
    'password' => 'hidden' 
]);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEMo - Gestor Emocional (Ayuda Profesional)</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <!-- React, ReactDOM, and Babel -->
    <script src="https://unpkg.com/react@18/umd/react.development.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        
        /* Ocultar el track nativo del slider */
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            background: transparent;
            margin: 10px 0;
            cursor: pointer;
        }

        /* Configuración del thumb (el circulito) */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #ffffff; 
            border: 3px solid var(--slider-color, #1e90ff); 
            cursor: pointer;
            margin-top: -8px; 
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        /* El track del slider (la barra) */
        input[type="range"]::-webkit-slider-runnable-track {
            width: 100%;
            height: 8px;
            cursor: pointer;
            border-radius: 4px;
            background: linear-gradient(to right, 
                #10b981 0%, 
                #10b981 30%, 
                #f59e0b 40%, 
                #f59e0b 70%, 
                #ef4444 80%, 
                #ef4444 100%
            );
            background-clip: padding-box;
            border: 1px solid #d1d5db;
        }

        /* Animaciones suaves */
        .animate-bar-grow {
            animation: growUp 0.6s ease-out forwards;
        }
        @keyframes growUp {
            from { height: 0%; opacity: 0; }
            to { opacity: 1; }
        }

        /* Estilos para el chat */
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 400px;
        }
        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        .message-bubble {
            max-width: 80%;
            padding: 0.5rem 1rem;
            border-radius: 1rem;
            font-size: 0.9rem;
            position: relative;
        }
        .message-own {
            align-self: flex-end;
            background-color: #0891b2; /* cyan-600 */
            color: white;
            border-bottom-right-radius: 0;
        }
        .message-other {
            align-self: flex-start;
            background-color: #f3f4f6; /* gray-100 */
            color: #1f2937; /* gray-800 */
            border-bottom-left-radius: 0;
            border: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
    <div id="root"></div>
    <script type="text/babel" src="vistas/js/ScriptGEMo.js"></script>
</body>
</html>