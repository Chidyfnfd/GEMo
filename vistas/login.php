<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GEMo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body className="bg-cyan-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg mx-auto mt-20">
        <h1 class="text-3xl font-bold text-cyan-800 mb-2 text-center">GEMo</h1>
        <p class="text-gray-500 text-center mb-6">Iniciar Sesión (MySQL)</p>

        <?php if(isset($error)) echo "<p class='text-red-500 text-center text-sm mb-4'>$error</p>"; ?>

        <form action="index.php?accion=login" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="mt-1 w-full p-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" name="password" required class="mt-1 w-full p-2 border rounded-lg focus:ring-2 focus:ring-cyan-500 outline-none">
            </div>
            <button type="submit" class="w-full bg-cyan-600 text-white font-bold py-3 px-4 rounded-lg hover:bg-cyan-700 transition shadow-md">
                Entrar
            </button>
        </form>
        <div class="mt-6 text-center">
            <a href="index.php?accion=form_registro" class="text-cyan-700 text-sm hover:underline">¿No tienes cuenta? Regístrate</a>
        </div>
    </div>
</body>
</html>
