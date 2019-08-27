<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterStoreRequest extends FormRequest
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
        $validationRequest = Validator::make([
            'name' => trim($request->get('name')),
            'user_name' =>trim($request->get('username')),
            'password' =>trim($request->get('password')),
            'confirm_password' =>trim($request->get('password_confirm')),
            'country' =>trim($request->get('country')),
            'city' =>trim($request->get('city')),
            'district' =>trim($request->get('district')),
            'telephone'  => trim($request->get('telephone'))
        ], [
            'name' => ['required', 'string', 'max:255','min:4',
                'unique:hotels', 'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
            'user_name' => ['required', 'string', 'max:255','min:4','unique:hotels','without_spaces',
                'regex:/(^([a-zA-Z]+)(\d+)?$)/u'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:hotels'],
            'password' => ['required', 'min:8', 'max:100','confirmed','string',
                'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/',
                'unique:hotels'],
            'confirm_password' => ['required', 'same:password','confirmed','string'],
            'country' =>['required_with_all :city,district','country'],
            'city' =>['required_with_all :country,district','string','max:100','min:4',
                'regex:/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/'],
            'district' =>['required_with_all :country,city','string','min:4','max:100',
                'regex:/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/'],
            'telephone' =>['required','numeric','phone_number','size:11'],
        ]);

        if ($validationRequest->fails())
        {
            return redirect()->back()->withErrors($validationRequest->errors());
        }
         else
        return [
            'name' => trim($request->get('name')),
            'username' =>trim($request->get('username')),
            'password' =>trim($request->get('password')),
            'country' =>trim($request->get('country')),
            'city' =>trim($request->get('city')),
            'district' =>trim($request->get('district')),
            'telephone'  => trim($request->get('telephone')),
        ];
    }
}
