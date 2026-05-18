@extends('layouts.app')

@section('content')

@php
    $details = json_decode($report->report_result, true);

    $score = $details['score'] ?? 80;
@endphp

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="md:col-span-2 bg-white p-8 rounded shadow">

        <h1 class="text-4xl font-bold mb-6">
            Reporte Premium Vehicular 🚗
        </h1>

        <div class="grid grid-cols-2 gap-6">

            <div>
                <strong>VIN:</strong><br>
                {{ $report->vin }}
            </div>

            <div>
                <strong>Marca:</strong><br>
                {{ $report->brand }}
            </div>

            <div>
                <strong>Modelo:</strong><br>
                {{ $report->model }}
            </div>

            <div>
                <strong>Año:</strong><br>
                {{ $report->year }}
            </div>

            <div>
                <strong>Tipo Vehículo:</strong><br>
                {{ $details['vehicle_type'] ?? 'N/A' }}
            </div>

            <div>
                <strong>País Fabricación:</strong><br>
                {{ $details['country'] ?? 'N/A' }}
            </div>

            <div>
                <strong>Motor:</strong><br>
                {{ $details['engine'] ?? 'N/A' }}
            </div>

            <div>
                <strong>Airbags:</strong><br>
                {{ $details['airbags'] ?? 'N/A' }}
            </div>

        </div>

    </div>

    <div class="bg-white p-8 rounded shadow">

        <h2 class="text-3xl font-bold mb-6">
            Score
        </h2>

        <div class="text-6xl font-bold text-green-600">
            {{ $score }}
        </div>

        <p class="mt-4 text-gray-600">
            Estado General Vehicular
        </p>

    </div>

</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">

    <div class="bg-red-100 p-6 rounded shadow">

        <h2 class="text-2xl font-bold">
            Accidentes
        </h2>

        <p class="text-5xl mt-4">
            {{ $details['accidents'] }}
        </p>

    </div>

    <div class="bg-yellow-100 p-6 rounded shadow">

        <h2 class="text-2xl font-bold">
            Recall
        </h2>

        <p class="text-3xl mt-4">
            {{ $details['recall'] }}
        </p>

    </div>

    <div class="bg-green-100 p-6 rounded shadow">

        <h2 class="text-2xl font-bold">
            Reporte Robo
        </h2>

        <p class="text-3xl mt-4">
            {{ $details['stolen'] }}
        </p>

    </div>

</div>

@endsection