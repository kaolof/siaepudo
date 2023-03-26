<?php

namespace App\Http\Controllers;

use App;
use App\SolicitudesPendientes;
use Illuminate\Http\Request;
use PDF;

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

    public function generatePDF()
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('solicitudespendientes.myPDF', $data);
  
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