<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StorePet extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|min:2',
            'especie' => 'required|in:c,C,g,G',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'Deve ter no mínimo 2 caracteres',
            'especie.required' => 'O campo especie é obrigatório.',
            'especie.in' => 'Valores permitidos (C, G)',
        ];
    }

    /**
     * @param $validator
     */
    public function withValidator($validator)
    {
        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'mensagem'   => 'Dados informados não inválidos.',
                'status' => false,
                'errors'    => $validator->errors(),
                'url'    => route('pets.store')
            ], 422));
        }
    }
}
