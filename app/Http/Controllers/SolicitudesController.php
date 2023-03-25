<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Pagos;
use App\Solicitudespendientes;
use App\Persona;
use App\User;

class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {   
        $request->user()->authorizeRoles(['user','estudiante']);
        $solicitudespendientes = App\SolicitudesPendientes::all();
        return view('solicitudes.index',compact('solicitudespendientes'),
        [
            'pluck' => ['NavItemActive' => 'solicitudes'],
        ]
        );
    }

    public function guardar(Request $request)
{   

    //return $request->all();
    
    $pagos = new Pagos;
    $pagos->num_solicitud = $request->num_solicitud;
    $pagos->banco_emisor = $request->banco_emisor;
    $pagos->num_comprobante = $request->num_comprobante;
    $pagos->fecha = $request->fecha; 
    $pagos->imagen_comprobante =$request->imagen_comprobante;
    $pagos->precio = $request->precio;

    $pagos->save(); 

    $user = auth()->user();
    $persona = $user->persona;

    /*$user = User::find(5);
    dd($user->persona);*/

    $solicitudespendientes = new Solicitudespendientes;
    $solicitudespendientes->nombre = $persona->nombre;
    $solicitudespendientes->cedula = $persona->id;
    //$solicitudespendientes->nombre = $persona->nombre;

    $solicitudespendientes->save();

    return redirect()->route('solicitudes.index');
   
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = 0, $idalterno = 0)
    {
        // tu código aquí
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $retorno = 'index', $idalterno = 0)
{
    // tu código aquí
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
