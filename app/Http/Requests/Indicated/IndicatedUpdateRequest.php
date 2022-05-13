<?php

namespace App\Http\Requests\Indicated;

use Illuminate\Foundation\Http\FormRequest;

class IndicatedUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'situacao' => 'required|integer|in:1,2,3'
        ];
    }
}
