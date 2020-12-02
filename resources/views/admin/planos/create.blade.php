@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.plano.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.planos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="marca">{{ trans('cruds.plano.fields.marca') }}</label>
                <input class="form-control {{ $errors->has('marca') ? 'is-invalid' : '' }}" type="text" name="marca" id="marca" value="{{ old('marca', '') }}">
                @if($errors->has('marca'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marca') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.marca_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="ano">{{ trans('cruds.plano.fields.ano') }}</label>
                <input class="form-control {{ $errors->has('ano') ? 'is-invalid' : '' }}" type="text" name="ano" id="ano" value="{{ old('ano', '') }}">
                @if($errors->has('ano'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ano') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.ano_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="veiculo">{{ trans('cruds.plano.fields.veiculo') }}</label>
                <input class="form-control {{ $errors->has('veiculo') ? 'is-invalid' : '' }}" type="text" name="veiculo" id="veiculo" value="{{ old('veiculo', '') }}">
                @if($errors->has('veiculo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('veiculo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.veiculo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="km">{{ trans('cruds.plano.fields.km') }}</label>
                <input class="form-control {{ $errors->has('km') ? 'is-invalid' : '' }}" type="text" name="km" id="km" value="{{ old('km', '') }}">
                @if($errors->has('km'))
                    <div class="invalid-feedback">
                        {{ $errors->first('km') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.km_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="periodo">{{ trans('cruds.plano.fields.periodo') }}</label>
                <input class="form-control {{ $errors->has('periodo') ? 'is-invalid' : '' }}" type="text" name="periodo" id="periodo" value="{{ old('periodo', '') }}">
                @if($errors->has('periodo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('periodo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.periodo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="r_zero">{{ trans('cruds.plano.fields.r_zero') }}</label>
                <input class="form-control {{ $errors->has('r_zero') ? 'is-invalid' : '' }}" type="number" name="r_zero" id="r_zero" value="{{ old('r_zero', '') }}" step="0.01">
                @if($errors->has('r_zero'))
                    <div class="invalid-feedback">
                        {{ $errors->first('r_zero') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.r_zero_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="r_um">{{ trans('cruds.plano.fields.r_um') }}</label>
                <input class="form-control {{ $errors->has('r_um') ? 'is-invalid' : '' }}" type="number" name="r_um" id="r_um" value="{{ old('r_um', '') }}" step="0.01">
                @if($errors->has('r_um'))
                    <div class="invalid-feedback">
                        {{ $errors->first('r_um') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.r_um_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="r_dois">{{ trans('cruds.plano.fields.r_dois') }}</label>
                <input class="form-control {{ $errors->has('r_dois') ? 'is-invalid' : '' }}" type="number" name="r_dois" id="r_dois" value="{{ old('r_dois', '') }}" step="0.01">
                @if($errors->has('r_dois'))
                    <div class="invalid-feedback">
                        {{ $errors->first('r_dois') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.r_dois_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="r_tres">{{ trans('cruds.plano.fields.r_tres') }}</label>
                <input class="form-control {{ $errors->has('r_tres') ? 'is-invalid' : '' }}" type="number" name="r_tres" id="r_tres" value="{{ old('r_tres', '') }}" step="0.01">
                @if($errors->has('r_tres'))
                    <div class="invalid-feedback">
                        {{ $errors->first('r_tres') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.plano.fields.r_tres_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="foto">Foto Veiculo</label>
                <div class="custom-file">

                    <input type="file" name="image" class="custom-file-input" id="foto">
                    <label class="custom-file-label" for="foto">Selecione uma foto do Veiculo</label>
                </div>
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

@section('scripts')

    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection
