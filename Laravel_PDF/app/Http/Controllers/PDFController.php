<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $data = [
            'id' => $request->data['id'],
            'nombre' => $request->data['nombre'],
            'version' => $request->data['version'],
            'cg' => $request->data['cg'],
            'trabajo_tarea' => $request->data['trabajo_tarea'],
        ];
    
    Log::info($data);
        $dompdf = new Dompdf();
        $view = view('pdf_template', $data);
        $html = $view->render();
    
        $dompdf->loadHtml($html);
        $dompdf->render();
    
        return response($dompdf->output())
            ->header('Content-Type', 'application/pdf');
    }
    
}
