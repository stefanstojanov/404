<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use PDF;
use App\Result;
use App\Institution;
use App\User;

class PDFController extends Controller
{
    public function napravi_pdf($result){
        $rezultat=DB::table('results')
                        ->join('users','results.user_id','=','users.id')
                        ->join('values','results.id','=','values.result_id')
                        ->join('items','values.item_id','=','items.id')
                        ->where('results.id','=',$result)
                        ->select('items.name as item_name','users.first_name as first_name','values.value as value')
                        ->get();
        $current=auth()->user();
        if($current->isMaticen())
        {
            $maticen=User::find($current->id);
            $pacient=DB::table('ima_maticen')
                        ->where('maticen_id','=',$maticen->id)
                        ->first();
        }
        else if($current->isPacient())
        {
            $pacient=User::find($current->id);
            $maticen=DB::table('ima_maticen')
                            ->where('pacient_id','=',$pacient->id)
                            ->first();
        }
        $pdf = PDF::loadView('PDF.pdf', compact('rezultat','maticen','pacient'));
        return $pdf->download('rezultat.pdf');
    }
}
