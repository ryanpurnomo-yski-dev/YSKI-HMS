<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function export()
    {
        $data = [
            'title' => 'Laporan Data Pengguna',
            'date' => date('d/m/Y')
        ];
        $pdf = Pdf::loadView('components.documents.pdf', $data);
        return $pdf->stream('components.documents.laporan');
    }
}
