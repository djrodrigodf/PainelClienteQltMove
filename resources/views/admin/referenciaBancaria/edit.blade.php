@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.referenciaBancarium.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.referencia-bancaria.update", [$referenciaBancarium->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="banco_codigo">{{ trans('cruds.referenciaBancarium.fields.banco_codigo') }}</label>
                <input class="form-control {{ $errors->has('banco_codigo') ? 'is-invalid' : '' }}" type="text" name="banco_codigo" id="banco_codigo" value="{{ old('banco_codigo', $referenciaBancarium->banco_codigo) }}">
                @if($errors->has('banco_codigo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banco_codigo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenciaBancarium.fields.banco_codigo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="agencia_codigo">{{ trans('cruds.referenciaBancarium.fields.agencia_codigo') }}</label>
                <input class="form-control {{ $errors->has('agencia_codigo') ? 'is-invalid' : '' }}" type="text" name="agencia_codigo" id="agencia_codigo" value="{{ old('agencia_codigo', $referenciaBancarium->agencia_codigo) }}">
                @if($errors->has('agencia_codigo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('agencia_codigo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenciaBancarium.fields.agencia_codigo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conta">{{ trans('cruds.referenciaBancarium.fields.conta') }}</label>
                <input class="form-control {{ $errors->has('conta') ? 'is-invalid' : '' }}" type="text" name="conta" id="conta" value="{{ old('conta', $referenciaBancarium->conta) }}">
                @if($errors->has('conta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenciaBancarium.fields.conta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tempo_de_conta">{{ trans('cruds.referenciaBancarium.fields.tempo_de_conta') }}</label>
                <input class="form-control {{ $errors->has('tempo_de_conta') ? 'is-invalid' : '' }}" type="text" name="tempo_de_conta" id="tempo_de_conta" value="{{ old('tempo_de_conta', $referenciaBancarium->tempo_de_conta) }}">
                @if($errors->has('tempo_de_conta'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tempo_de_conta') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenciaBancarium.fields.tempo_de_conta_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cartao_de_credito">{{ trans('cruds.referenciaBancarium.fields.cartao_de_credito') }}</label>
                <input class="form-control {{ $errors->has('cartao_de_credito') ? 'is-invalid' : '' }}" type="text" name="cartao_de_credito" id="cartao_de_credito" value="{{ old('cartao_de_credito', $referenciaBancarium->cartao_de_credito) }}">
                @if($errors->has('cartao_de_credito'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cartao_de_credito') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenciaBancarium.fields.cartao_de_credito_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection