<?php

namespace App\Http\Requests;

use App\Models\ReferenciaPessoal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReferenciaPessoalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('referencia_pessoal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:referencia_pessoals,id',
        ];
    }
}
