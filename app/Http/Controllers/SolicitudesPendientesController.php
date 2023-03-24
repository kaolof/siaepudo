<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Http\Request;

/* use DB;

use Yajra\DataTables\DataTables;

use App\NucleoPrograma;
use App\Nucleo;
use App\Grado;
use App\EstudiantePrograma; */

class SolicitudesPendientesController extends Controller{
    public function index(Request $request){

        
        $solicitudespendientes = App\SolicitudesPendientes::all();
        return view('solicitudespendientes.index',compact('solicitudespendientes'),[ 'pluck' => ['NavItemActive' => 'solicitudespendientes'],]);
        
    
    }
}