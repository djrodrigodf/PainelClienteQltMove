<?php

namespace App\Http\Requests;

use App\Models\ReferenciaBancarium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReferenciaBancariumRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('referencia_bancarium_edit');
    }

    public function rules()
    {
        return [
            'banco_codigo'      => [
                'string',
                'nullable',
            ],
            'agencia_codigo'    => [
                'string',
                'nullable',
            ],
            'conta'             => [
                'string',
                'nullable',
            ],
            'tempo_de_conta'    => [
                'string',
                'nullable',
            ],
            'cartao_de_credito' => [
                'string',
                'nullable',
            ],
        ];
    }
}
