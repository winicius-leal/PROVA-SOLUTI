<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroFormRequest extends FormRequest
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
        return [
            'CPF' => 'required|size:11|unique:c_p_f_s,numero',
            'email' => 'email|unique:users,email',
            'name' => 'required|min:1|max:50',
            'DataNascimento' => 'required|size:10',
            'ddd' => 'required|min:2|max:3',
            'telefone' => 'required|min:8|max:9',
            'rua' => 'required',
            'numero' => 'required|min:1|max:9',
            'bairro' => 'required|min:1|max:30',
            'cidade' => 'required|min:1|max:30',
            'estado' => 'required|min:1|max:30',
            'password' => 'confirmed|min:6'
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'email já cadastrado',
            'CPF.unique' => 'CPF já cadastrado',
            'name.required' => 'Nome é Obrigatorio',
            'name.min' => 'Nome é invalido',
            'CPF.required' => 'CPF é Obrigatorio',
            'CPF.size' => 'CPF é invalido',
            'DataNascimento.required' => 'Data de Nascimento é Obrigatorio',
            'DataNascimento.size' => 'Data de Nascimento inválida',
            'ddd.required' => 'DDD é Obrigatorio',
            'ddd.min' => 'DDD é invalido',
            'ddd.max' => 'DDD é invalido',
            'telefone.required' => 'telefone é Obrigatorio',
            'telefone.min' => 'telefone é invalido',
            'telefone.max' => 'telefone é invalido',
            'rua.required' => 'rua é Obrigatorio',  
            'numero.required' => 'numero é Obrigatorio',
            'numero.min' => 'numero é invalido',
            'numero.max' => 'numero é invalido',
            'bairro.required' => 'numero é Obrigatorio',
            'bairro.min' => 'numero é invalido',
            'bairro.max' => 'numero é invalido',
            'cidade.required' => 'cidade é Obrigatorio',
            'cidade.min' => 'cidade é invalido',
            'cidade.max' => 'cidade é invalido',
            'estado.required' => 'estado é Obrigatorio',
            'estado.min' => 'estado é invalido',
            'estado.max' => 'estado é invalido',
            'cidade.required' => 'cidade é Obrigatorio',
            'cidade.min' => 'cidade é invalido',
            'cidade.max' => 'cidade é invalido',
            'email.email' => 'email é invalido',
            'password.confirmed' => 'senhas não correspondem',
            'password.min' => 'senhas deve ter mais de 6 caracteres',
        ];
    }


}