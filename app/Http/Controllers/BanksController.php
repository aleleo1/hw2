<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\Like;
use App\Models\Sumup;
class BanksController extends Controller
{
  public function show()
  {
    $data = Sumup::get();
    return view('home.banks', ['data' => $data, 'likes'=>$this->getLikes()]);
  }

  public function original(Request $request)
  {
    $id = $request->all()['id'];
    $originaltext = Sumup::where('ID', $id)->value('DATA');
    echo $originaltext;
  }


  public function like(Request $request)
  {
    /*    echo json_encode($request->getContent()); */
    $content = json_decode($request->getContent());
    $index = $content->id;
    $data = $content->data;
    $cond =   $this->checkLike($data, $index)/*  ? http_response_code(500) : http_response_code(200)*/;
  /*  echo json_encode($cond); */
  /*  echo 'diobe'; */
  return $cond ? response("il riassunto è già in raccolta o è l'originale", 403) : $this->addLike($index, $data);
  /*   $this->addLike($index, $data); */
  }

  private function checkLike(string $data, $section)
  {

    $check = DB::table('likes')->where('data', $data)->where('user_id', auth()->user()->matricola)->value('id');
   /*  $check = Like::where('data', $data)->where('user_id', auth()->user()->matricola)->value('id'); */
    $s = Sumup::where('ID', $section)->value('DATA');
    $str2=str_replace(["\n", " "],"",$s);
    $str =str_replace(["\n", " "],"",$data);
   /*  echo json_encode(array('data'=>$data, 'check'=>$str, 'comp'=> strcmp($str, $str2))); */
   /*  echo $data; */
    /* return  $check2 === $data ? true : false; */
/*    echo $check; */
$check2 = strcmp($str, $str2) === 0;
return $check or $check2;
  }

  private function addLike($id, string $data)
  {
    $uid = auth()->user()->matricola;
      
    $arr = array('user_id'=>$uid, 'data'=>$data, 'section'=>(int)$id, 'created_at'=>Carbon::now());
    $like = new Like($arr);
    $cond = $like->save();
   /*  $cond = DB::table('likes')->insert($arr); */
    return  $cond ? response(json_encode(array('date'=>$arr['created_at'], 'id'=>$like->id)), 200) : response('errore interno, riprova', 500);
  }

  private function getLikes(){
    $uid = auth()->user()->matricola;
    $likes = Like::select('section','id', 'created_at')->where('user_id', $uid)->get();
    $arr = array();
    foreach($likes as $like){
   isset($arr[(int)$like->section]) ? array_push($arr[(int)$like->section], ['id'=>$like->id,'date'=>$like->created_at]) :   $arr[(int)$like->section]  =  array(['id'=>$like->id, 'date'=>$like->created_at]);
    }
    return $arr;
  }

  public function dislike(Request $request){
    $id = $request->all()['id'];
    Like::where('id', $id)->delete();

  }

  public function show_like(Request $request){
 /*    echo json_encode($request); */
 /*    $id = $request->all()['id']; */
    $id = json_decode($request->getContent())->id;
    $text = Like::where('id', $id)->value('data');
    echo $text;
  }

  public function openai_sumup(Request $request)
  {
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
