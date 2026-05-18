@extends('layouts.app')

@section('content')

<div class="bg-white p-10 rounded shadow">

    <h1 class="text-4xl font-bold mb-8">
        Reportes Vehiculares
    </h1>

    <table class="w-full">

        <thead class="bg-gray-200">

            <tr>
                <th class="p-3">Usuario</th>
                <th class="p-3">VIN</th>
                <th class="p-3">Vehículo</th>
                <th class="p-3">Tipo</th>
            </tr>

        </thead>

        <tbody>

            @foreach($reports as $report)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $report->user->name }}
                    </td>

                    <td class="p-3">
                        {{ $report->vin }}
                    </td>

                    <td class="p-3">
                        {{ $report->brand }} {{ $report->model }}
                    </td>

                    <td class="p-3">
                        {{ $report->report_type }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection