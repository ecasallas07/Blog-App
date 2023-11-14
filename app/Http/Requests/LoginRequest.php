<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    //Para validar, ya que puede ingresar un correco electronico o el username
    public function getCredentials()
    {
        //obtengo el valor
        $username = $this->get('username');
        if($this->isEmail($username))
        {
            // dd($username, $this->get('password'));
            
            return[
                'email'=> $username,
                'password'=> $this->get('password')
            ];
        }

        return[
            'username'=> $username,
            'password'=> $this->get('password')
        ];
    }

    public function isEmail($value): bool
    {
        //Contruir una validacion especifica para los elemntos
        $factory = $this->container->make(ValidationFactory::class);
        //En este caso le asigno el valor primeramente y luego en el otro arreglo pongo el tipo de dato que recibo
        //Al poner signo de admiracion niego el valor y luego con fails doy respuesta de si falla lo regreso como false
        /*Sin el signo de admiracion signficaria que si no es un email devuel ve un verdadero por la funcion fails, entonces el signo de admiraciones si
            si es falso el el valor el fails trae falsoel valor
        */
        return !$factory->make(['username' => $value],['username' => 'email'])->fails();
    }
}
