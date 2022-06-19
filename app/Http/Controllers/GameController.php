<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GameController extends Controller
{
   public function show()
   {
   /*  $images = DB::table('game_images')->where('SECTION', 1)->get();
    echo json_encode($images); */
   /*  echo json_encode($this->images()); */
   $images = $this->images();
    return view('home.theGame', ['images'=>$images] );
   }

   private function images(){
    $arr[] = array();
    for($i=1; $i<=3;$i++){
    $images = DB::table('game_images')->where('SECTION', $i)->get();
    array_push($arr, $images);};
    return $arr;
   }

   public function result(Request $request)
   {
    $data = $request->all();
    $result = DB::table('results')->where("name", $data['choice'])->get();
    echo json_encode($result);
   }

 
}