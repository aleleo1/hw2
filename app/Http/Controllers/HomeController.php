<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
 

class HomeController extends Controller

{

    public function index()

    {
      if(Auth::user())
       { $user = Auth::user()->getAttributeValue('nome');
      return view('home.index',$user ? ['user'=>$user] : ['user'=>'lol']);
}
else{
  return view('home.index',['user'=>'']);
}
    }

}