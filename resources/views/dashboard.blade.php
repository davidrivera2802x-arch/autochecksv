@extends('layouts.app')

@php

$reportsCount = auth()->user()->vehicleReports()->count();

@endphp

@section('content')

<div class="bg-white p-10 rounded shadow">

    <h1 class="text-4xl font-bold mb-4">
        Bienvenido a AutoCheck SV 🚗
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

    <div class="bg-blue-600 text-white p-6 rounded shadow">

        <h2 class="text-3xl font-bold">
            {{ $reportsCount }}
        </h2>

        <p class="mt-2">
            Reportes Generados
        </p>

    </div>

    <div class="bg-yellow-500 text-white p-6 rounded shadow">

        <h2 class="text-3xl font-bold">

            @if(auth()->user()->is_premium)
                PREMIUM
            @else
                FREE
            @endif

        </h2>

        <p class="mt-2">
            Tipo de Cuenta
        </p>

    </div>

    <div class="bg-green-600 text-white p-6 rounded shadow">

        <h2 class="text-3xl font-bold">
            Activa
        </h2>

        <p class="mt-2">
            Estado Plataforma
        </p>

    </div>

</div>

    <p class="text-gray-600 mb-6">
        Sistema inteligente de verificación vehicular por VIN.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-blue-100 p-6 rounded">
            <h2 class="text-2xl font-bold">
                Reporte Básico
            </h2>

            <p class="mt-2">
                Información básica del vehículo.
            </p>
        </div>

        <div class="bg-yellow-100 p-6 rounded">
            <h2 class="text-2xl font-bold">
                Reporte Premium
            </h2>

            <p class="mt-2">
                Historial completo y análisis avanzado.
            </p>
        </div>

        <div class="bg-green-100 p-6 rounded">
            <h2 class="text-2xl font-bold">
                Mecánicos
            </h2>

            <p class="mt-2">
                Agenda revisiones con expertos.
            </p>
        </div>

    </div>

    <div class="mt-10">

        <a href="/upgrade"
           class="bg-yellow-500 text-white px-6 py-3 rounded">
            Obtener Premium
        </a>

    </div>

</div>

@endsection
