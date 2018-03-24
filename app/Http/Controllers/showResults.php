<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Result;
use DB;
use Auth;

class showResults extends Controller
{
    public function pokazi_grafa()
    {
        $item_id=request('item_id');
        $item=Item::find($item_id);
        $max=$item->max;
        $min=$item->min;
        $max_array=[];
        $min_array=[];
        $values_array=[];
        $dates_array=[];
        $max_gorna=2*$max;
        $max_gorna_array=[];
        $user_id=auth()->user()->id;
        $values=DB::table('results')
                    ->join('values','results.id','=','values.result_id')
                    ->join('items','values.item_id','=','items.id')
                    ->where('results.user_id','=',$user_id)
                    ->where('items.id','=',$item_id)
                    ->select('items.name as name','items.max as max','items.min as min','results.created_at as date','values.value as value')
                    ->get();
        $results_count=Result::where('user_id','=',$user_id)->count();
        for($i=0;$i<$results_count;$i++)
        {
            $max_gorna_array[$i]=$max_gorna;
            $max_array[$i]=$max;
            $min_array[$i]=$min;
            $values_array[$i]=$values[$i]->value;
            $dates_array[$i]=$values[$i]->date;
        }
        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels($dates_array)
        ->datasets([
            [
                "label" => $item->name,
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $values_array,
            ],
            [
                "label" => "Dolna granica",
                'backgroundColor' => "rgba(255, 255, 255, 0.31)",
                'borderColor' => "rgba(38, 0, 0, 0.7)",
                "pointBorderColor" => "rgba(38, 0, 0, 0.7)",
                "pointBackgroundColor" => "rgba(38, 0, 0, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $min_array,
            ],
            [
                "label" => "Gorna granica",
                'backgroundColor' => "rgba(255, 255, 255, 0.31)",
                'borderColor' => "rgba(0, 0, 154, 0.7)",
                "pointBorderColor" => "rgba(0, 0, 154, 0.7)",
                "pointBackgroundColor" => "rgba(0, 0, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => $max_array,
            ],
            [
                "label" => "",
                'backgroundColor' => "rgba(255, 255, 255, 0)",
                'borderColor' => "rgba(0, 0, 154, 0)",
                "pointBorderColor" => "rgba(0, 0, 154, 0)",
                "pointBackgroundColor" => "rgba(0, 0, 154, 0)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,0)",
                'data' => $max_gorna_array,
            ]

        ])
        ->options([]);


        return view('results.showResults', compact('chartjs','values'));
    }
}
