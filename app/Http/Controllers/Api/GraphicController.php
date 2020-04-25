<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Flat;
use App\View;
use Illuminate\Support\Carbon;

class GraphicController extends Controller
{
    public function graphic(Request $request){
        $data = $request->all();
        
        // if(empty($data["id"]) or !is_int($data["id"])){
        //     $response = "Id non valido";
        //     $view = [];
        // }else{
            $id = $data["id"];
            $flat = Flat::where('id', $id)->first();
            
            // dd(Carbon::yesterday()->toDateString());
            for ($i = 0; $i < 7; $i++) {
                # code...
                $view[Carbon::now()->subDays($i)->toDateString()] = View::where('date', '=', Carbon::now()->subDays($i)->toDateString())
                    ->where("flat_id", "=", $flat->id)->get()->count();
            };

        // }
        $response = "200";
        $data = [
            "response" => $response,
            "view" => $view,
        ];
        return response()->json($view);
    }
}
