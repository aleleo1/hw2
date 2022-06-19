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

        /* $data = $request->getCredentials(); */
        $credentials = $request->validate(['matricola'=>'required|numeric', 'password'=>'required']);
        $fixed = array('matricola'=>(int) $credentials['matricola'],'password' =>$credentials['password']);
        /* if (!Auth::validate($credentials)) :

            return redirect()->to('login')

                ->withErrors(trans('auth.failed'));

        endif; */

 

       
       
 
        if(Auth::attempt($fixed))
       { 
       
    
     /*   Auth::user(); */
        return $this->authenticated($fixed);
     /*   $user = Auth::getProvider()->retrieveByCredentials($fixed);
       echo json_encode($user); */
       }
        else
        return redirect()->to('login')

                ->withErrors(trans('auth.failed'));
      /*   echo json_encode($data); */
/*       echo json_encode($fixed); */
  
    

    }

 

    /**

     * Handle response after user authenticated

     * 

     * @param array $credentials

     * 

     * @return \Illuminate\Http\Response

     */

    protected function authenticated(array $credentials)

    {
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        
        return redirect()->intended();
      /*  echo json_encode($user); */

    }

}