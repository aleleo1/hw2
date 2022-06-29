<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gimages;
use App\Models\Result;
class GameController extends Controller
{
   public function show()
   {
   /*  $images = Gimages::where('SECTION', 1)->get();
    echo json_encode($images); */
   /*  echo json_encode($this->images()); */
   $images = $this->images();
    return view('home.theGame', ['images'=>$images], ['titles'=>['Supereroe preferito?', 'Cane preferito?', 'Gatto preferito?']] );
   }

   private function images(){
    $arr[] = array();
    for($i=1; $i<=3;$i++){
    $images = Gimages::where('SECTION', $i)->get();
    array_push($arr, $images);};
    return $arr;
   }

   public function result(Request $request)
   {
    $data = $request->all();
    $newnum = Result::where('NAME', $data['choice'])->value('NUM_INTERACTIONS') + 1;
    Result::where('NAME', $data['choice'])->update(['NUM_INTERACTIONS'=>$newnum]);
    $result = Result::where("NAME", $data['choice'])->get();
    echo json_encode($result);
   }

 
}
