@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header lg:text-xl">Quadminds -> WebService Externo AVL San Luis</div>

                <div class="card-body">
                    <table class="table-auto w-100">
                        <thead>
                            <tr>
                            <th class="px-4 py-2">Vehículo</th>
                            <th class="px-4 py-2">Lat, Long</th>
                            <th class="px-4 py-2">Último post</th>
                            <th class="px-4 py-2">Respuesta WS SL</th>
                            <th class="px-4 py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vehiculos as $vehiculo)
                            @php
                            if($vehiculo->ultimo_post){
                                $fecha = explode(" ", $vehiculo->ultimo_post);
                                $fechaExploded = date("d/m/Y", strtotime($fecha[0]));
                                $horaExploded = date("H:i:s", strtotime($fecha[1]));
                            } else {
                                $fechaExploded = "null";
                                $horaExploded = "null";
                            }
                            @endphp
                                <tr>
                                    <td>{{ $vehiculo->nombre }} </br>{{ $vehiculo->patente }}</td>
                                    <td><a target="_blank" class="underline text-blue-700" href="http://maps.googleapis.com/maps/api/staticmap?zoom=18&size=600x600&maptype=roadmap&markers=icon:https://geo.pihuelsa.com.ar/imagenes/marker.png|{{ $vehiculo->lat }},{{ $vehiculo->long }}&key=AIzaSyDTJHxsm4KhHCuHS-XQ58q6RloM9bxrjGY">{{ $vehiculo->lat }} </br>{{ $vehiculo->long }}</a></td>
                                    <td>{{ $fechaExploded }} </br> {{ $horaExploded }}</td>
                                    <td>{{ $vehiculo->msjPost }}</td>
                                    <td><a class="bg-orange-500 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded" href="/vehiculos/{{ $vehiculo->id }}/edit">editar</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-red-600">Aun no hay vehículos cargados</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                <tr>
                            @endforelse
                        </tbody>
                    </table>

                    <a href="/vehiculos/create" class="mt-4 bg-blue-500 block hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">+ Cargar vehículo</a>
            </div>
        </div>
    </div>
</div>
@endsection
