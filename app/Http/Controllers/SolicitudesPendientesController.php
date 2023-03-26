<?php

namespace App\Http\Controllers;

use App;
use App\SolicitudesPendientes;
use Illuminate\Http\Request;
use PDF;
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
        
        //$registro = SolicitudesPendientes::where('Num_Comprobante', $Num_Comprobante)->first();

        $datos_documento.delete();

        
  
        return  $pdf->stream();
    }

    public function mostrarComprobante($Num_Comprobante)
    {
        
        $registro = SolicitudesPendientes::where('Num_Comprobante', $Num_Comprobante)->first();

        if (!$registro) {
            abort(404);
        }
    
        $imageData = $registro->imagen_comprobante;


        $pdf = PDF::loadView('solicitudespendientes.comprobante', ['image' => $imageData]);
        return  $pdf->stream();


       
    }

 
}