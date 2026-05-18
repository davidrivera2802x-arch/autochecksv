@extends('layouts.app')

@section('content')

<div class="bg-white p-10 rounded shadow">

    <h1 class="text-4xl font-bold mb-8">
        Usuarios Registrados
    </h1>

    <table class="w-full">

        <thead class="bg-gray-200">

            <tr>
                <th class="p-3 text-left">Nombre</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Rol</th>
                <th class="p-3 text-left">Premium</th>
            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

                <tr class="border-b">

                    <td class="p-3">
                        {{ $user->name }}
                    </td>

                    <td class="p-3">
                        {{ $user->email }}
                    </td>

                    <td class="p-3">
                        {{ $user->role }}
                    </td>

                    <td class="p-3">

                        @if($user->is_premium)

                            <span class="text-green-600 font-bold">
                                Sí
                            </span>

                        @else

                            <span class="text-red-600 font-bold">
                                No
                            </span>

                        @endif

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection