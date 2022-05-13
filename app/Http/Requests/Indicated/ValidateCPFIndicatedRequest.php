<?php

namespace App\Http\Requests\Indicated;

use Illuminate\Foundation\Http\FormRequest;

class ValidateCPFIndicatedRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cpf_indicado' => 'required|cpf'
        ];
    }

    public function messages()
    {
        return [
            'cpf_indicado.cpf' => 'O campo cpf é inválido.',
        ];
    }

    public function validationData()
    {
        $data = $this->all();

        $data['cpf_indicado'] = func_remove_mask_number($data['cpf_indicado']);

        return $data;
    }
}
