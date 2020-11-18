<?php

namespace App\Http\Requests;

use App\Models\Cliente;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClienteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cliente_edit');
    }

    public function rules()
    {
        return [
            'nome_completo'             => [
                'string',
                'nullable',
            ],
            'cpf'                       => [
                'string',
                'nullable',
            ],
            'rg'                        => [
                'string',
                'nullable',
            ],
            'dt_emissao_rg'             => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'dt_nasc'                   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'cnh'                       => [
                'string',
                'nullable',
            ],
            'dt_validade_cnh'           => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'nacionalidade'             => [
                'string',
                'nullable',
            ],
            'nome_do_pai'               => [
                'string',
                'nullable',
            ],
            'nome_da_mae'               => [
                'string',
                'nullable',
            ],
            'grau_de_inst'              => [
                'string',
                'nullable',
            ],
            'estado_civil'              => [
                'string',
                'nullable',
            ],
            'nome_do_conjuge'           => [
                'string',
                'nullable',
            ],
            'endereco'                  => [
                'string',
                'nullable',
            ],
            'complemento'               => [
                'string',
                'nullable',
            ],
            'bairro'                    => [
                'string',
                'nullable',
            ],
            'cidade'                    => [
                'string',
                'nullable',
            ],
            'estado'                    => [
                'string',
                'nullable',
            ],
            'cep'                       => [
                'string',
                'nullable',
            ],
            'tempo_de_residencia'       => [
                'string',
                'nullable',
            ],
            'tel_resid'                 => [
                'string',
                'nullable',
            ],
            'tel_celular'               => [
                'string',
                'nullable',
            ],
            'plano'                     => [
                'string',
                'nullable',
            ],
            'valor_plano'               => [
                'string',
                'nullable',
            ],
            'prof_nome_da_empresa'      => [
                'string',
                'nullable',
            ],
            'prof_endereco_comercial'   => [
                'string',
                'nullable',
            ],
            'prof_cnpj'                 => [
                'string',
                'nullable',
            ],
            'prof_bairro'               => [
                'string',
                'nullable',
            ],
            'prof_cidade'               => [
                'string',
                'nullable',
            ],
            'prof_estado'               => [
                'string',
                'nullable',
            ],
            'prof_cep'                  => [
                'string',
                'nullable',
            ],
            'prof_tel_comercial'        => [
                'string',
                'nullable',
            ],
            'prof_data_de_admissao'     => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'prof_porte_da_empresa'     => [
                'string',
                'nullable',
            ],
            'prof_cargo_funcao'         => [
                'string',
                'nullable',
            ],
            'prof_ocupacao'             => [
                'string',
                'nullable',
            ],
            'prof_renda_bruta'          => [
                'string',
                'nullable',
            ],
            'prof_outras_rendas'        => [
                'string',
                'nullable',
            ],
            'prof_forma_de_comprovacao' => [
                'string',
                'nullable',
            ],
            'prof_patrimonio'           => [
                'string',
                'nullable',
            ],
            'referenia_pessoals.*'      => [
                'integer',
            ],
            'referenia_pessoals'        => [
                'array',
            ],
        ];
    }
}
