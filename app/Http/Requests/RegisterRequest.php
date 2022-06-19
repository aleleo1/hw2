<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

 

class RegisterRequest extends FormRequest

{

    /**

     * Determine if the user is authorized to make this request.

     *

     * @return bool

     */

    public function authorize()

    {

        return true;  // By default this will be false 

    }

 

    /**

     * Get the validation rules that apply to the request.

     *

     * @return array

     */

    public function rules()

    {

        return [
            'nome' =>'nullable',
            
            'cognome' =>'nullable',

            'email' => 'required',

            'matricola' => 'required|min:8|unique:users,matricola',

            'password' => 'required|min:8',

            'password_confirmation' => 'required|same:password'

        ];

    }

}