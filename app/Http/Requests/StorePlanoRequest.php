<?php

namespace App\Http\Requests;

use App\Models\Plano;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePlanoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('plano_create');
    }

    public function rules()
    {
        return [
            'marca'   => [
                'string',
                'nullable',
            ],
            'ano'     => [
                'string',
                'nullable',
            ],
            'veiculo' => [
                'string',
                'nullable',
            ],
            'km'      => [
                'string',
                'nullable',
            ],
            'periodo' => [
                'string',
                'nullable',
            ],
        ];
    }
}
