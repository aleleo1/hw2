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

   public function original(Request $request){
    $data = $request->all();
    $id = $request->all()['id'];
    $originaltext = DB::table('sumups')->where('ID', $id)->value('DATA');
    echo $originaltext;
   }

   public function openai_sumup(Request $request){
    $OPENAI_API_KEY = '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';
header('Content-Type: text/plain');
/* echo $request->getContent(); */
    $prompt = $request->getContent() . '\nTl;dr:';
$postfields = '{
  "prompt": "' . $prompt . '",
  "temperature": 0.85,
  "max_tokens": 600,
  "top_p": 1.0,
  "frequency_penalty": 0.0,
  "presence_penalty": 0.0
}';


$curl = curl_init();

if ($request) {
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.openai.com/v1/engines/text-davinci-002/completions',
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $postfields,
    CURLOPT_HTTPHEADER => array(
      'Content-Type: application/json',
      'Authorization: Bearer ' . $OPENAI_API_KEY
    ),
  ));
}


$response = curl_exec($curl);

if ($response) {
 echo $response;
} else  http_response_code(404);

curl_close($curl);
   }


}
