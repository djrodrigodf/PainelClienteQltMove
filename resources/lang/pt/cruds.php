<?php

return [
    'userManagement'      => [
        'title'          => 'Gestão de Utilizadores',
        'title_singular' => 'Gestão de Utilizadores',
    ],
    'permission'          => [
        'title'          => 'Permissões',
        'title_singular' => 'Permissão',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'                => [
        'title'          => 'Grupos',
        'title_singular' => 'Função',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'                => [
        'title'          => 'Utilizadores',
        'title_singular' => 'Utilizador',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'cliente'             => [
        'title'          => 'Cliente',
        'title_singular' => 'Cliente',
        'fields'         => [
            'id'                               => 'ID',
            'id_helper'                        => ' ',
            'nome_completo'                    => 'Nome Completo',
            'nome_completo_helper'             => ' ',
            'cpf'                              => 'Cpf',
            'cpf_helper'                       => ' ',
            'rg'                               => 'Rg',
            'rg_helper'                        => ' ',
            'dt_emissao_rg'                    => 'Data de emissão RG',
            'dt_emissao_rg_helper'             => ' ',
            'dt_nasc'                          => 'Data de nasc.',
            'dt_nasc_helper'                   => ' ',
            'cnh'                              => 'Nº CNH',
            'cnh_helper'                       => ' ',
            'dt_validade_cnh'                  => 'Data de validade CNH',
            'dt_validade_cnh_helper'           => ' ',
            'nacionalidade'                    => 'Nacionalidade',
            'nacionalidade_helper'             => ' ',
            'nome_do_pai'                      => 'Nome Do Pai',
            'nome_do_pai_helper'               => ' ',
            'nome_da_mae'                      => 'Nome Da Mae',
            'nome_da_mae_helper'               => ' ',
            'grau_de_inst'                     => 'Grau De Inst',
            'grau_de_inst_helper'              => ' ',
            'def_fisico'                       => 'Def. físico',
            'def_fisico_helper'                => ' ',
            'estado_civil'                     => 'Estado civil',
            'estado_civil_helper'              => ' ',
            'nome_do_conjuge'                  => 'Nome do cônjuge',
            'nome_do_conjuge_helper'           => ' ',
            'endereco'                         => 'Endereço residencial completo',
            'endereco_helper'                  => ' ',
            'complemento'                      => 'Complemento',
            'complemento_helper'               => ' ',
            'bairro'                           => 'Bairro',
            'bairro_helper'                    => ' ',
            'cidade'                           => 'Cidade',
            'cidade_helper'                    => ' ',
            'estado'                           => 'Estado',
            'estado_helper'                    => ' ',
            'cep'                              => 'Cep',
            'cep_helper'                       => ' ',
            'tempo_de_residencia'              => 'Tempo de residência',
            'tempo_de_residencia_helper'       => ' ',
            'tel_resid'                        => 'Tel. Resid.',
            'tel_resid_helper'                 => ' ',
            'tel_celular'                      => 'Tel. Celular',
            'tel_celular_helper'               => ' ',
            'email'                            => 'E-mail',
            'email_helper'                     => ' ',
            'prof_nome_da_empresa'             => 'Nome da empresa',
            'prof_nome_da_empresa_helper'      => ' ',
            'prof_endereco_comercial'          => 'Endereço comercial completo',
            'prof_endereco_comercial_helper'   => ' ',
            'prof_cnpj'                        => 'CNPJ(se for sócio)',
            'prof_cnpj_helper'                 => ' ',
            'prof_bairro'                      => 'Bairro',
            'prof_bairro_helper'               => ' ',
            'prof_cidade'                      => 'Cidade',
            'prof_cidade_helper'               => ' ',
            'prof_estado'                      => 'Estado',
            'prof_estado_helper'               => ' ',
            'prof_cep'                         => 'CEP',
            'prof_cep_helper'                  => ' ',
            'prof_tel_comercial'               => 'Tel. comercial',
            'prof_tel_comercial_helper'        => ' ',
            'prof_sede_propria'                => 'Sede própria',
            'prof_sede_propria_helper'         => ' ',
            'prof_data_de_admissao'            => 'Data de admissão',
            'prof_data_de_admissao_helper'     => ' ',
            'prof_porte_da_empresa'            => 'Porte da empresa',
            'prof_porte_da_empresa_helper'     => ' ',
            'prof_cargo_funcao'                => 'Cargo/função',
            'prof_cargo_funcao_helper'         => ' ',
            'prof_ocupacao'                    => 'Ocupação',
            'prof_ocupacao_helper'             => ' ',
            'prof_renda_bruta'                 => 'Renda bruta',
            'prof_renda_bruta_helper'          => ' ',
            'prof_outras_rendas'               => 'Outras rendas',
            'prof_outras_rendas_helper'        => ' ',
            'prof_forma_de_comprovacao'        => 'Forma de comprovação',
            'prof_forma_de_comprovacao_helper' => ' ',
            'prof_patrimonio'                  => 'Patrimônio',
            'prof_patrimonio_helper'           => ' ',
            'created_at'                       => 'Created at',
            'created_at_helper'                => ' ',
            'updated_at'                       => 'Updated at',
            'updated_at_helper'                => ' ',
            'deleted_at'                       => 'Deleted at',
            'deleted_at_helper'                => ' ',
            'referenia_pessoal'                => 'Referência pessoal',
            'referenia_pessoal_helper'         => ' ',
            'referencia_bancaria'              => 'Referência bancária',
            'referencia_bancaria_helper'       => ' ',
            'created_by'                       => 'Created By',
            'created_by_helper'                => ' ',
            'plano'                            => 'Plano',
            'plano_helper'                     => ' ',
            'valor_plano'                      => 'Valor Plano',
            'valor_plano_helper'               => ' ',
            'cpf_conjuge'                      => 'CPF',
            'cpf_conjuge_helper'               => ' ',
            'nasc_conjunge'                    => 'Nascimento',
            'nasc_conjunge_helper'             => ' ',
        ],
    ],
    'referenciaPessoal'   => [
        'title'          => 'Referencia Pessoal',
        'title_singular' => 'Referencia Pessoal',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'nome_completo'        => 'Nome Completo',
            'nome_completo_helper' => ' ',
            'telefone'             => 'Telefone',
            'telefone_helper'      => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'referenciaBancarium' => [
        'title'          => 'Referencia Bancaria',
        'title_singular' => 'Referencia Bancarium',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'banco_codigo'             => 'Banco(código)',
            'banco_codigo_helper'      => ' ',
            'agencia_codigo'           => 'Agência(código)',
            'agencia_codigo_helper'    => ' ',
            'conta'                    => 'Conta',
            'conta_helper'             => ' ',
            'tempo_de_conta'           => 'Tempo de conta',
            'tempo_de_conta_helper'    => ' ',
            'cartao_de_credito'        => 'Cartão de Crédito',
            'cartao_de_credito_helper' => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'auditLog'            => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
];
