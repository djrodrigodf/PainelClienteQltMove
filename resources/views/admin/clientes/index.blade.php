@extends('layouts.admin')
@section('content')
@can('cliente_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.clientes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.cliente.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.cliente.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Cliente">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.nome_completo') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.cpf') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.rg') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.dt_emissao_rg') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.dt_nasc') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.cnh') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.dt_validade_cnh') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.nacionalidade') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.nome_do_pai') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.nome_da_mae') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.grau_de_inst') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.def_fisico') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.estado_civil') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.nome_do_conjuge') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.cpf_conjuge') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.nasc_conjunge') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.endereco') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.complemento') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.bairro') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.cidade') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.cep') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.tempo_de_residencia') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.tel_resid') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.tel_celular') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.plano') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.valor_plano') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_nome_da_empresa') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_endereco_comercial') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_cnpj') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_bairro') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_cidade') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_estado') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_cep') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_tel_comercial') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_sede_propria') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_data_de_admissao') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_porte_da_empresa') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_cargo_funcao') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_ocupacao') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_renda_bruta') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_outras_rendas') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_forma_de_comprovacao') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.prof_patrimonio') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.referenia_pessoal') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.referencia_bancaria') }}
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $key => $cliente)
                        <tr data-entry-id="{{ $cliente->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cliente->id ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->nome_completo ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->cpf ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->rg ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->dt_emissao_rg ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->dt_nasc ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->cnh ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->dt_validade_cnh ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->nacionalidade ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->nome_do_pai ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->nome_da_mae ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->grau_de_inst ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Cliente::DEF_FISICO_SELECT[$cliente->def_fisico] ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->estado_civil ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->nome_do_conjuge ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->cpf_conjuge ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->nasc_conjunge ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->endereco ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->complemento ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->bairro ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->cidade ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->estado ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->cep ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->tempo_de_residencia ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->tel_resid ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->tel_celular ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->email ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->plano ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->valor_plano ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_nome_da_empresa ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_endereco_comercial ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_cnpj ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_bairro ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_cidade ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_estado ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_cep ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_tel_comercial ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Cliente::PROF_SEDE_PROPRIA_SELECT[$cliente->prof_sede_propria] ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_data_de_admissao ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_porte_da_empresa ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_cargo_funcao ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_ocupacao ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_renda_bruta ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_outras_rendas ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_forma_de_comprovacao ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->prof_patrimonio ?? '' }}
                            </td>
                            <td>
                                @foreach($cliente->referenia_pessoals as $key => $item)
                                    <span class="badge badge-info">{{ $item->nome_completo }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $cliente->referencia_bancaria->banco_codigo ?? '' }}
                            </td>
                            <td>
                                {{ $cliente->status->status ?? '' }}
                            </td>
                            <td>
                                @can('cliente_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.clientes.show', $cliente->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cliente_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clientes.edit', $cliente->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cliente_delete')
                                    <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('cliente_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clientes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Cliente:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection