<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Institution;

class PDFController extends Controller
{
    public function napravi_pdf(){
        $institutions=Institution::all();
        $pdf = PDF::loadView('PDF.pdf', compact('institutions'));
        return $pdf->download('rezultat.pdf');
    }
}
