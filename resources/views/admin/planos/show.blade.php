@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.plano.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.planos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.id') }}
                        </th>
                        <td>
                            {{ $plano->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td>
                            @if ($plano->foto)
                                <img src="{{url('storage\\' . $plano->foto)}}" width="100px" alt="">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.marca') }}
                        </th>
                        <td>
                            {{ $plano->marca }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.ano') }}
                        </th>
                        <td>
                            {{ $plano->ano }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.veiculo') }}
                        </th>
                        <td>
                            {{ $plano->veiculo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.km') }}
                        </th>
                        <td>
                            {{ $plano->km }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.periodo') }}
                        </th>
                        <td>
                            {{ $plano->periodo }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.r_zero') }}
                        </th>
                        <td>
                            {{ $plano->r_zero }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.r_um') }}
                        </th>
                        <td>
                            {{ $plano->r_um }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.r_dois') }}
                        </th>
                        <td>
                            {{ $plano->r_dois }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.plano.fields.r_tres') }}
                        </th>
                        <td>
                            {{ $plano->r_tres }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.planos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
