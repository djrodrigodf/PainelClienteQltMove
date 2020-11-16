@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.referenciaPessoal.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.referencia-pessoals.update", [$referenciaPessoal->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nome_completo">{{ trans('cruds.referenciaPessoal.fields.nome_completo') }}</label>
                <input class="form-control {{ $errors->has('nome_completo') ? 'is-invalid' : '' }}" type="text" name="nome_completo" id="nome_completo" value="{{ old('nome_completo', $referenciaPessoal->nome_completo) }}">
                @if($errors->has('nome_completo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nome_completo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenciaPessoal.fields.nome_completo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="telefone">{{ trans('cruds.referenciaPessoal.fields.telefone') }}</label>
                <input class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" type="text" name="telefone" id="telefone" value="{{ old('telefone', $referenciaPessoal->telefone) }}">
                @if($errors->has('telefone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('telefone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenciaPessoal.fields.telefone_helper') }}</span>
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