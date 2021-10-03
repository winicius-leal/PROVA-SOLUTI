<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificadoFormRequest extends FormRequest
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
            'certificado' => 'required|file|filled',
        ];
    }
    public function messages()
    {
        return [
            'certificado.required' => 'Nenhum certificado selecionado',
            'certificado.file' => 'Deve ser um arquivo valido',
            'certificado.filled' => 'O arquivo não pode estar vazio'

        ];
    }
}
