<?php

namespace App\Http\Requests;

use App\Models\StatusCliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStatusClienteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('status_cliente_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
