@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-8 rounded shadow-md">

    <h1 class="text-3xl font-bold mb-6">
        Buscar Vehículo por VIN
    </h1>

    <form action="{{ route('vin.store') }}" method="POST">
        @csrf

        <input
            type="text"
            name="vin"
            placeholder="Ingrese VIN"
            class="w-full border rounded px-4 py-2 mb-4"
        >

        <button
            type="submit"
            onclick="this.innerHTML='Buscando...';"
            class="bg-blue-600 text-white px-6 py-2 rounded">
                Buscar
        </button>
    </form>

</div>

<div class="mt-10">

    <h2 class="text-2xl font-bold mb-4">
        Historial de Reportes
    </h2>

    <table class="w-full bg-white rounded shadow">

        <thead class="bg-gray-200">
    <tr>
        <th class="p-3 text-left">Vehículo</th>
        <th class="p-3 text-left">Año</th>
        <th class="p-3 text-left">Reporte</th>
        <th class="p-3 text-left">Fecha</th>
        <th class="p-3 text-left">Acciones</th>
    </tr>
        </thead>

        <tbody>

            @forelse($reports as $report)

                <tr class="border-b">

                    <td class="p-3">
                        <strong>{{ $report->vin }}</strong><br>
                        {{ $report->brand }} {{ $report->model }}
                    </td>

                    <td class="p-3">
                        {{ $report->year }}
                    </td>

                    <td class="p-3">
                        {{ $report->report_type }}
                    </td>

                    <td class="p-3">
                        {{ $report->created_at->format('d/m/Y') }}
                    </td>

                </tr>

            <td class="p-3">

            <a href="{{ route('vin.show', $report->id) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded">
                Ver
            </a>

</td>

            @empty

                <tr>
                    <td colspan="4" class="p-3">
                        <div class="text-center py-10">

    <div class="text-6xl mb-4">
        🚗
    </div>

    <p class="text-gray-500 text-xl">
        Aún no tienes reportes generados
    </p>

</div>
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection