<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
     <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Iconos <link rel="stylesheet" href="../css/app.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/app.css')
</head>
    <body>
        <div class="flex justify-center mt-10">

            <div class="bg-white shadow-lg p-8 w-96">

            <h2 class="text-xl font-bold mb-4 text-center">
            Iniciar sesión
            </h2>

                <form action="{{ route('login.cliente') }}" method="POST">

                @csrf

                    <input type="email" name="email" placeholder="Correo"
                    class="w-full border p-2 mb-3">

                    <input type="password" name="password" placeholder="Contraseña"
                    class="w-full border p-2 mb-3">

                        <button class="bg-amber-700 text-white w-full py-2 rounded">
                        Entrar
                        </button>

                </form>

            </div>

        </div>
        <script src="../js/app.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

    </body>
</html>