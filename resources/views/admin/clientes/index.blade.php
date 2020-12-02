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

        <div class="filtros">
            <form name="form_filter" id="form_filter" action="{{route('admin.clientes.filter')}}" method="post">
            <div class="row">
                    @csrf
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="filtro_status">Status</label>
                            <select class="form-control select2 w-100" name="filtro_status" id="filtro_status">
                                <option value="">Selecione</option>
                                @foreach($status as $s)
                                    <option @if($s->id == $select) selected @endif value="{{$s->id}}">{{$s->status}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

            </div>
            </form>
        </div>

        <hr>

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
                            Nome/CPF
                        </th>
                        <th>
                            Plano
                        </th>
                        <th>
                            {{ trans('cruds.cliente.fields.status') }}
                        </th>
                        <th>Data da Solicitação</th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($propostas as $key => $proposta)
                        <tr data-entry-id="{{ $proposta->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $proposta->id ?? '' }}
                            </td>
                            <td>
                                {{ $proposta->cliente->nome_completo ?? '' }}
                                <br>
                                <b><span class="small">{{ $cliente->cpf ?? '' }}</span></b>
                            </td>
                            <td>
                                {!! \App\Models\Plano::meuPlano($proposta->plano_id) !!}
                            </td>
                            <td>
                                {{ $proposta->status->status ?? '' }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($proposta->created_at)->format('d/m/Y H:i') ?? '' }}
                            </td>
                            <td>
                                @can('cliente_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.propostas.show', $proposta->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cliente_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.clientes.edit', $proposta->cliente->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cliente_delete')
                                    <form action="{{ route('admin.clientes.destroy', $proposta->cliente->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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

    $('#filtro_status').change(function() {
        console.log('teste')
        $("form[name='form_filter']").submit();
    });

</script>

@endsection
