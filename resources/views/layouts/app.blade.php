<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AutoCheck SV</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<nav class="bg-gray-900 text-white p-4 shadow">

    <div class="container mx-auto flex justify-between items-center">

        <h1 class="text-2xl font-bold">
            🚗 AutoCheck SV
        </h1>

        <div class="flex gap-4 items-center">

            <a href="/dashboard" class="hover:text-gray-300">
                Dashboard
            </a>

            <a href="/vin-search" class="hover:text-gray-300">
                Buscar VIN
            </a>

            <a href="/mechanics" class="hover:text-gray-300">
                Mecánicos
            </a>

            @if(auth()->user()->role === 'admin')

                <a href="/admin" class="text-yellow-400">
                    Admin
                </a>

                <a href="/admin/users" class="text-blue-300">
                    Usuarios
                </a>

                <a href="/admin/reports" class="text-green-300">
                    Reportes
                </a>

            @endif

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button class="bg-red-600 px-4 py-2 rounded">
                    Logout
                </button>
            </form>

        </div>

    </div>

</nav>

<div class="container mx-auto mt-10">

    @yield('content')

</div>

<footer class="bg-gray-900 text-white mt-20 p-6">

    <div class="container mx-auto text-center">

        <p class="text-lg">
            AutoCheck SV © 2026
        </p>

        <p class="text-gray-400 mt-2">
            Sistema inteligente de verificación vehicular
        </p>

    </div>

</footer>

</body>
</html>
