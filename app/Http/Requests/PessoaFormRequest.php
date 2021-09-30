<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaFormRequest extends FormRequest
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
            "nome"=>"required|min:2",
            "dataNascimento"=>"required",
            "cpf"=>"required|min:11|numeric",
            "telefone"=>"required|min:8|numeric",
            "ddd"=>"required|digits:2|numeric",
            "rua"=>"required",
            "numero"=>"required|numeric",
            "bairro"=>"required",
            "cidade"=>"required",
            "estado"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "required" => " :attribute é obrigatorio",
            "min" => "Quantidade de caracteres do campo :attribute é invalido",
            "digits" => "Quantidade de digitos do campo :attribute deve ser 2",
            "numeric" => "O campo :attribute deve ser numérico"
        ];
    }
}
