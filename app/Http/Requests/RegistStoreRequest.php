<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data_valid =[
            'Name' =>'required|unique:hotels|regx:/^([a-zA-Z]+)[0-9_\.]+{4,100}$/',
             'E-Mail Address' =>'required|unique:hotels|
                                regx:/^([*+!.&#$¦\'\\%\/0-9a-z^_`{}=?~:-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i',
             'Password' =>'required|unique:hotels|
                           regx:/^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})$/',
             'Coniform Password' =>'required|same:Password',
        ];
        return
            back()->with($data_valid) ;
    }
}
