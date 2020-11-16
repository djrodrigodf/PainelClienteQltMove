<?php

namespace App\Http\Requests;

use App\Models\ReferenciaBancarium;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReferenciaBancariumRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('referencia_bancarium_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:referencia_bancaria,id',
        ];
    }
}
