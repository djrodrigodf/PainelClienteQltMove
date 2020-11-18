<?php

namespace App\Models;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Cliente extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable, HasFactory;

    public $table = 'clientes';

    const DEF_FISICO_SELECT = [
        '1' => 'Sim',
        '0' => 'Não',
    ];

    const PROF_SEDE_PROPRIA_SELECT = [
        '1' => 'Sim',
        '0' => 'Não',
    ];

    protected $dates = [
        'dt_emissao_rg',
        'dt_nasc',
        'dt_validade_cnh',
        'prof_data_de_admissao',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome_completo',
        'cpf',
        'rg',
        'dt_emissao_rg',
        'dt_nasc',
        'cnh',
        'dt_validade_cnh',
        'nacionalidade',
        'nome_do_pai',
        'nome_da_mae',
        'grau_de_inst',
        'def_fisico',
        'estado_civil',
        'nome_do_conjuge',
        'cpf_conjuge',
        'nasc_conjunge',
        'endereco',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'tempo_de_residencia',
        'tel_resid',
        'tel_celular',
        'email',
        'plano',
        'valor_plano',
        'prof_nome_da_empresa',
        'prof_endereco_comercial',
        'prof_cnpj',
        'prof_bairro',
        'prof_cidade',
        'prof_estado',
        'prof_cep',
        'prof_tel_comercial',
        'prof_sede_propria',
        'prof_data_de_admissao',
        'prof_porte_da_empresa',
        'prof_cargo_funcao',
        'prof_ocupacao',
        'prof_renda_bruta',
        'prof_outras_rendas',
        'prof_forma_de_comprovacao',
        'prof_patrimonio',
        'referencia_bancaria_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public static function boot()
    {
        parent::boot();
        Cliente::observe(new \App\Observers\ClienteActionObserver);
    }

    public function getDtEmissaoRgAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDtEmissaoRgAttribute($value)
    {
        $this->attributes['dt_emissao_rg'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDtNascAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDtNascAttribute($value)
    {
        $this->attributes['dt_nasc'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDtValidadeCnhAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDtValidadeCnhAttribute($value)
    {
        $this->attributes['dt_validade_cnh'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getProfDataDeAdmissaoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setProfDataDeAdmissaoAttribute($value)
    {
        $this->attributes['prof_data_de_admissao'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function referenia_pessoals()
    {
        return $this->belongsToMany(ReferenciaPessoal::class);
    }

    public function referencia_bancaria()
    {
        return $this->belongsTo(ReferenciaBancarium::class, 'referencia_bancaria_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
