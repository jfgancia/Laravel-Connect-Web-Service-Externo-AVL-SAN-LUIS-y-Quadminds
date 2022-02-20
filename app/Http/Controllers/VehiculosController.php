<?php

namespace App\Http\Controllers;

use App\Vehiculo;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'fl' => 'numeric|required',
            'sfl' => 'numeric|required',
            'nombre' => 'required',
            'patente' => 'required',
            'quadminds_vehiculo_id' => 'required',
        ]); 
    
           $vehiculo = new Vehiculo();
           $vehiculo->fl = request('fl');
           $vehiculo->sfl = request('sfl');
           $vehiculo->nombre = request('nombre');
           $vehiculo->patente = request('patente');
           $vehiculo->quadminds_vehiculo_id = request('quadminds_vehiculo_id');
    
    
           $vehiculo->save();
    
            return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        request()->validate([
            'fl' => 'numeric|required',
            'sfl' => 'numeric|required',
            'nombre' => 'required',
            'patente' => 'required',
            'quadminds_vehiculo_id' => 'required',
        ]); 

           $vehiculo->fl = request('fl');
           $vehiculo->sfl = request('sfl');
           $vehiculo->nombre = request('nombre');
           $vehiculo->patente = request('patente');
           $vehiculo->quadminds_vehiculo_id = request('quadminds_vehiculo_id');
    
    
           $vehiculo->save();
    
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect('/home');
    }
}
