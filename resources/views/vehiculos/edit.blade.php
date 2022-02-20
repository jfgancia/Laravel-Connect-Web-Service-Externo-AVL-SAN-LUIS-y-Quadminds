@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-xl">Cargando vehículo</div>
                <div class="card-body">
                    <form method="post" action="/vehiculos/{{ $vehiculo->id }}" class="w-full">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="fl">
                                    fl: Identificador de flota
                                </label>
                                <input value="{{ $vehiculo->fl }}" class="@error('fl') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="fl" id="fl" type="text" placeholder="...">
                                @error('fl')
                                    <p class="text-red-500">{{ $errors->first('fl') }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="sfl">
                                    sfl: Identificador de subflota
                                </label>
                                <input value="{{ $vehiculo->sfl }}" class="@error('sfl') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="sfl" id="sfl" type="text" placeholder="...">
                                @error('sfl')
                                    <p class="text-red-500">{{ $errors->first('sfl') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                                    Nombre
                                </label>
                                <input value="{{ $vehiculo->nombre }}" class="@error('nombre') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="nombre" id="nombre" type="text" placeholder="...">
                                @error('nombre')
                                    <p class="text-red-500">{{ $errors->first('nombre') }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="patente">
                                    Patente
                                </label>
                                <input value="{{ $vehiculo->patente }}" class="@error('patente') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="patente" id="patente" type="text" placeholder="...">
                                @error('patente')
                                    <p class="text-red-500">{{ $errors->first('patente') }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="quadminds_vehiculo_id">
                                Quadminds Vehiculo ID
                            </label>
                            <input value="{{ $vehiculo->quadminds_vehiculo_id }}" class="@error('quadminds_vehiculo_id') border-red-500 @enderror appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="quadminds_vehiculo_id" id="quadminds_vehiculo_id" type="text" placeholder="...">
                            @error('quadminds_vehiculo_id')
                                <p class="text-red-500">{{ $errors->first('quadminds_vehiculo_id') }}</p>
                            @enderror
                        </div>
                        </div>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Actualizar
                        </button>
                    </form>
                    <form method="post" action="/vehiculos/{{ $vehiculo->id }}" class="w-auto mt-4">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
