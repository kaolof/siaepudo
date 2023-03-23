<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function generarPdf()
    {
        $data = ['mensaje' => 'Hola, este es mi PDF generado con Laravel!'];
        $pdf = PDF::loadView('pdf.index', $data);
        return $pdf->download('mi_pdf.pdf');
    }
}
