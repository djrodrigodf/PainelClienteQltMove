<?php

namespace App\Http\Requests;

use App\Models\ReferenciaPessoal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReferenciaPessoalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('referencia_pessoal_edit');
    }

    public function rules()
    {
        return [
            'nome_completo' => [
                'string',
                'nullable',
            ],
            'telefone'      => [
                'string',
                'nullable',
            ],
        ];
    }
}
