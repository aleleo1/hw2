<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Http\Requests\RegisterRequest;

use Illuminate\Support\Facades\Hash;
 

class RegisterController extends Controller

{

    //

    /**

     * Display register page.

     * 

     * @return \Illuminate\Http\Response

     */

    public function show()

    {

        return view('auth.register');

    }

 

    /**

     * Handle account registration request

     * 

     * @param RegisterRequest $request

     * 

     * @return \Illuminate\Http\Response

     */

    public function register(RegisterRequest $request)

    {
      

       /*  $pas = Hash::make($request->get('password'));
        $request->set('password', $pas); */
        $user = User::create($request->validated());
        $user->fill([
            'password'=>Hash::make($request->password)
        ])->save();
       

       /*  auth()->login($user); */

 

        return redirect('/login')->with('success', "Account successfully registered.");

    }

}