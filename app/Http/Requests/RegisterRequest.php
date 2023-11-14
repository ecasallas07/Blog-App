<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //Al poner password confirmation same:password validq ue la passsword sea igual a la anterior
        return [
            'name'=> 'required|string',
            'email' => 'required|email',
            'username' => 'required|string|max:255|min:2',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
