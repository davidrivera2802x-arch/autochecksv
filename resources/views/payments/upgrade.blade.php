@extends('layouts.app')

@section('content')

<div class="bg-white p-10 rounded shadow max-w-lg mx-auto">

    <h1 class="text-4xl font-bold mb-6">
        Upgrade Premium 🚗
    </h1>

    <div class="bg-yellow-100 p-4 rounded mb-6">

    <ul class="space-y-2">

        <li>✅ Historial completo</li>
        <li>✅ Score vehicular</li>
        <li>✅ Accidentes</li>
        <li>✅ Recall</li>
        <li>✅ Reporte robo</li>

    </ul>

</div>

    <p class="mb-6">
        Obtén acceso a reportes completos.
    </p>

    <form method="POST" action="/process-payment">

        @csrf

        <input
            type="text"
            placeholder="Número Tarjeta"
            class="w-full border rounded p-3 mb-4"
        >

        <button
            class="bg-yellow-500 text-white px-6 py-3 rounded w-full">
            Pagar $9.99
        </button>

    </form>

</div>

@endsection