@extends('layouts.app')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">

    <div class="bg-gray-900 text-white p-6 rounded shadow">

        <h2 class="text-2xl font-bold mb-6">
            Admin Panel
        </h2>

        <div class="space-y-4">

            <a href="/admin/dashboard" class="block">
                Dashboard
            </a>

            <a href="/admin/users" class="block">
                Usuarios
            </a>

            <a href="/admin/reports" class="block">
                Reportes
            </a>

        </div>

    </div>

    <div class="md:col-span-3 bg-white p-10 rounded shadow">

        <h1 class="text-4xl font-bold mb-8">
            Estadísticas Plataforma
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="bg-blue-100 p-6 rounded">
                <h2 class="text-4xl font-bold">
                    {{ $users }}
                </h2>

                <p class="mt-2">
                    Usuarios
                </p>
            </div>

            <div class="bg-green-100 p-6 rounded">
                <h2 class="text-4xl font-bold">
                    {{ $reports }}
                </h2>

                <p class="mt-2">
                    Reportes
                </p>
            </div>

            <div class="bg-yellow-100 p-6 rounded">
                <h2 class="text-4xl font-bold">
                    {{ $payments }}
                </h2>

                <p class="mt-2">
                    Pagos
                </p>
            </div>

            <div class="bg-red-100 p-6 rounded">
                <h2 class="text-4xl font-bold">
                    {{ $mechanics }}
                </h2>

                <p class="mt-2">
                    Mecánicos
                </p>
            </div>

        </div>

    </div>

</div>

@endsection