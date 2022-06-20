<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginRequest;

use Illuminate\Support\Facades\Auth;

 

class LoginController extends Controller

{

    /**

     * Display login page.

     * 

     * @return Renderable

     */

    public function show()

    {

        return view('auth.login');

    }

    /**

     * Handle account login request

     * 

     * @param LoginRequest $request

     * 

     * @return \Illuminate\Http\Response

     */

    public function login(Request $request)

    {
      
        
         $credentials = $request->validate(['matricola'=>'required|numeric', 'password'=>'required']);
        $remember = $request->get('remember_token') ? true : false;
      /*   echo json_encode($remember); */
        $fixed = array('matricola'=>(int) $credentials['matricola'],'password' =>$credentials['password']);
       
 

       
       
 
        if(Auth::attempt($fixed))
       { 

        return $this->authenticated($fixed, $remember);
   
       }
        else
        return redirect()->to('login')

                ->withErrors(trans('auth.failed')); 

  
    

    }

 

    /**

     * Handle response after user authenticated

     * 

     * @param array $credentials

     * 

     * @return \Illuminate\Http\Response

     */

    protected function authenticated(array $credentials, $remember = false)

    {
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user, $remember);
        
        return redirect()->intended();
      /*  echo json_encode($user); */

    }

}