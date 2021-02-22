<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreAtendimento extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'pet_id' => 'required|exists:pets,id',
            'data_atendimento' => 'required|date_format:Y-m-d',
        ];
    }

    public function messages(): array
    {
        return [
            'pet_id.required' => 'O campo pet_id é obrigatório.',
            'pet_id.exists' => 'Não existe um pet com o id :input.',
            'data_atendimento.required' => 'O campo data_atendimento é obrigatório.',
            'data_atendimento.date_format' => 'O campo data_atendimento deve estar no formato Y-m-d.'
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
                'url'    => route('atendimentos.store')
            ], 422));
        }
    }
}
