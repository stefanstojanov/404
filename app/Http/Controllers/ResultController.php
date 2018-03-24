<?php

namespace App\Http\Controllers;
use App\Item;
use App\Result;
use App\Value;
use DB;
use App\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function create(){
        $items=Item::all();
        $maticni=User::where('type','=','Матичен')->get();
        $pacienti=DB::table('users')
                        ->join('ima_maticen','users.id','=','ima_maticen.pacient_id')
                        ->where('users.type','=','пациент')
                        ->select('ima_maticen.maticen_id as maticen_id','users.first_name as first_name','users.id as id')
                        ->get();

        return view('results.create',compact('items','maticni','pacienti'));
    }

    public function edit($id){
        $result=Result::find($id);
        $stavki=DB::table('values')
            ->join('results','values.result_id','=','results.id')
            ->join('items','values.item_id','=','items.id')
            ->where('values.result_id','=',$result->id)
            ->select('values.id as id','items.name AS name','items.max as max','items.min as min','items.measure as measure','results.created_at as created_at','values.value as value','values.item_id as item_id')
            ->get();

        return view('results.edit',compact('stavki','result'));
    }

    public function update(Request $request){
        $input=$request->all();
        for($i=1;$i<=(count($input)/3);$i++) {
                Value::where('result_id', '=', request('result_id'))
                    ->where('item_id', '=', $input['item_id' . $i . ""])
                    ->update(['value' => $input['value' . $i . ""]]);
        }
        return redirect("/result/".request('result_id'));
    }

    public function store(Request $request){
        $id=auth()->user()->id;
        $result=Result::create([
            'laborant_id'=>$id,
            'user_id'=>request('user_id'),
            'details'=>'',
        ]);

        $user=User::where('id','=',$result->user_id)->first();

        $input=$request->all();
        for($i=1;$i<=(count($input)-1)/3;$i++){
            if($input["value".$i.""]!="")
            {
                Value::create([
                    'result_id'=>$result->id,
                    'item_id'=>$input['item_id'.$i.""],
                    'value'=>$input['value'.$i.""]
                ]);
            }
        }

        return redirect("/mail_rez/".$user->id);
    }

    public function show($id){
        $result=Result::find($id);
        $stavki=DB::table('values')
                    ->join('results','values.result_id','=','results.id')
                    ->join('items','values.item_id','=','items.id')
                    ->where('values.result_id','=',$result->id)
                    ->select('items.name AS name','items.max as max','items.min as min','items.measure as measure','results.created_at as created_at','values.value as value','items.id AS id')
                    ->get();
        return view('results.show',compact('stavki','result'));
    }

    public function svoi(){
        $user=auth()->user();
        if($user->isLaborant())
            $rezultati=Result::where('laborant_id','=',$user->id)->get();
        else if($user->isPacient())
            $rezultati=Result::where('user_id','=',$user->id)->get();
        return view('results.svoi',compact('rezultati'));
    }
}
