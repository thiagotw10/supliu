<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validationRequest extends FormRequest
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
            'nome' => 'required',
            'faixa' => 'required|array|min:1',
            'duracao' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatorio.',
            'faixa.array' => 'Faixa é obrigatorio.',
            'duracao.array' => 'Duracão é obrigatorio.',
        ];

    }
}
