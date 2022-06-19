<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BanksController extends Controller
{
   public function show(){
        $data = DB::table('sumups')->get();
    return view('home.banks', ['data'=>$data]);
     /*    foreach($data as $d){
            echo json_encode($d);
        } */

   }
}
