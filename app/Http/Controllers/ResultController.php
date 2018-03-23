<?php

namespace App\Http\Controllers;
use App\Item;
use App\Result;
use App\Value;
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
            'user_id'=>'3',
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
}
