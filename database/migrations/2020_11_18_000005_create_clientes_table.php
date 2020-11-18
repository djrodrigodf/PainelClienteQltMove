<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_completo')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->date('dt_emissao_rg')->nullable();
            $table->date('dt_nasc')->nullable();
            $table->string('cnh')->nullable();
            $table->date('dt_validade_cnh')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('nome_do_pai')->nullable();
            $table->string('nome_da_mae')->nullable();
            $table->string('grau_de_inst')->nullable();
            $table->string('def_fisico')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('nome_do_conjuge')->nullable();
            $table->string('endereco')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('cep')->nullable();
            $table->string('tempo_de_residencia')->nullable();
            $table->string('tel_resid')->nullable();
            $table->string('tel_celular')->nullable();
            $table->string('email')->nullable();
            $table->string('prof_nome_da_empresa')->nullable();
            $table->string('prof_endereco_comercial')->nullable();
            $table->string('prof_cnpj')->nullable();
            $table->string('prof_bairro')->nullable();
            $table->string('prof_cidade')->nullable();
            $table->string('prof_estado')->nullable();
            $table->string('prof_cep')->nullable();
            $table->string('prof_tel_comercial')->nullable();
            $table->string('prof_sede_propria')->nullable();
            $table->date('prof_data_de_admissao')->nullable();
            $table->string('prof_porte_da_empresa')->nullable();
            $table->string('prof_cargo_funcao')->nullable();
            $table->string('prof_ocupacao')->nullable();
            $table->string('prof_renda_bruta')->nullable();
            $table->string('prof_outras_rendas')->nullable();
            $table->string('prof_forma_de_comprovacao')->nullable();
            $table->string('prof_patrimonio')->nullable();
            $table->string('plano')->nullable();
            $table->string('valor_plano')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
