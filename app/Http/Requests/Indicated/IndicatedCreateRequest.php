<?php

namespace App\Http\Requests\Indicated;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IndicatedCreateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|',
            'email' => 'required|email|unique:usuario',
            'cpf' => 'required|unique:usuario|cpf',
            'telefone' => 'required',
            'cpf_indicado' => 'nullable|cpf|exists:usuario,cpf'
        ];
    }

    public function messages()
    {
        return [
            'cpf.cpf' => 'O campo cpf é inválido.',
            'cpf_indicado.exists' => 'O CPF informado não encontra-se na base de registros. remova-o ou informe-o novamente.'
        ];
    }

    public function validationData()
    {
        $data = $this->all();

        $data['cpf'] = func_remove_mask_number($data['cpf']);
        $data['cpf_indicado'] = !is_null($data['cpf_indicado']) ? func_remove_mask_number($data['cpf_indicado']) : null;

        return $data;
    }
}
