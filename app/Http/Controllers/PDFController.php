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
        $rezultat=Result::find($result)->first();
        $date=$rezultat->created_at;
        $items=DB::table('results')
                        ->join('users','results.user_id','=','users.id')
                        ->join('values','results.id','=','values.result_id')
                        ->join('items','values.item_id','=','items.id')
                        ->where('results.id','=',$result)
                        ->select('items.name as item_name','users.first_name as first_name','values.value as value','items.measure as measure','items.min as min','items.max as max')
                        ->get();
        $current=auth()->user();
        if($current->isMaticen())
        {
            $maticen=User::find($current->id);
            $pacient=DB::table('ima_maticen')
                        ->join('users','ima_maticen.pacient_id','=','users.id')
                        ->where('maticen_id','=',$maticen->id)
                        ->first();
        }
        else if($current->isPacient())
        {
            $pacient=User::find($current->id);
            $maticen=DB::table('ima_maticen')
                            ->join('users','ima_maticen.maticen_id','=','users.id')
                            ->select('users.')
                            ->where('pacient_id','=',$pacient->id)
                            ->first();
        }
        $laboratorija=DB::table('results')
                        ->join('users','results.laborant_id','=','users.id')
                        ->join('institutions','users.institution_id','=','institutions.id')
                        ->join('addresses','institutions.address_id','=','addresses.id')
                        ->where('results.id','=',$result)
                        ->select('institutions.name as institucija','addresses.city as city')
                        ->first();

        $pdf = PDF::loadView('PDF.pdf', compact('items','maticen','pacient','date','laboratorija'));
        return $pdf->download('rezultat.pdf');
    }
}
