<?php

namespace App\Http\Requests;

use App\Models\StatusCliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStatusClienteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('status_cliente_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:status_clientes,id',
        ];
    }
}
