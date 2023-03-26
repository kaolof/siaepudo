<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Http\Request;
use PDF;
use App\SolicitudesPendientes;
use App\Programa;
use App\EstudiantePrograma;
use App\NucleoPrograma;
use App\Nucleo;
use App\Persona;
use App\User;

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

    public function generatePDF($comprobante)
    {

        $idEstudiante=5;
        //nombre nucleo
        $RegistroEstudiantePrograma = EstudiantePrograma::where("id_persona",  $idEstudiante)->first();
        $idNucleo = $RegistroEstudiantePrograma->id_nucleo_programa;
        $nucleo=Nucleo::where("id", $idNucleo)->first();
        $nombreNucleo=$nucleo->nombre;
        
        //nombre posgrado
        $RegistroNucleoPrograma = NucleoPrograma::where("id", $idNucleo)->first();
        $id_programa = $RegistroNucleoPrograma->id_programa;
        $posgrado = Programa::where('id', $id_programa)->first(); 
        $nombrePosgrado=$posgrado->nombre;

        //comprobante
        $datos_documento = SolicitudesPendientes::where("comprobante", $comprobante)->first();
        //$idNucleo = $estudiantePrograma->id_nucleo_programa;
        $data = [ 'nombreSolicitud' =>  $datos_documento->solicitud 
        , 'nucleo'=>$nombreNucleo,'nombre'=>$datos_documento->nombre,
        'cedula'=>$datos_documento->cedula, 'posgrado'=>$nombrePosgrado];

        $pdf = PDF::loadView('solicitudespendientes.myPDF', $data);
  
        return  $pdf->stream();
    }

 
}