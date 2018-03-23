<?php

namespace App\Http\Controllers;
use App\Item;
use App\Result;
use App\Value;
use DB;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function create(){
        $items=Item::all();
        return view('rezultati.create',compact('items'));
    }

    public function store(Request $request){
        $id=auth()->user()->id;
        Result::create([
            'laborant_id'=>$id,
            'user_id'=>'8',
            'details'=>'pero',
        ]);

        $result_id=Result::orderBy('id','desc')->latest()->first()->id;

        $input=$request->all();
        for($i=1;$i<=(count($input)-1)/3;$i++){
            if($input["value".$i.""]!="")
            {
                Value::create([
                    'result_id'=>$result_id,
                    'item_id'=>$input['item_id'.$i.""],
                    'value'=>$input['value'.$i.""]
                ]);
            }
        }

    }

    public function show($id){
        $result=Result::find($id);
        $stavki=DB::table('values')
                    ->join('results','values.result_id','=','results.id')
                    ->join('items','values.item_id','=','items.id')
                    ->where('values.result_id','=',$result->id)
                    ->select('items.name AS name','items.max as max','items.min as min','items.measure as measure','results.created_at as created_at','values.value as value')
                    ->get();
        return view('results.show',compact('stavki','result'));
    }
}
