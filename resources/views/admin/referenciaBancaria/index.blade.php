@extends('layouts.admin')
@section('content')
@can('referencia_bancarium_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.referencia-bancaria.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.referenciaBancarium.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.referenciaBancarium.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ReferenciaBancarium">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.banco_codigo') }}
                        </th>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.agencia_codigo') }}
                        </th>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.conta') }}
                        </th>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.tempo_de_conta') }}
                        </th>
                        <th>
                            {{ trans('cruds.referenciaBancarium.fields.cartao_de_credito') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($referenciaBancaria as $key => $referenciaBancarium)
                        <tr data-entry-id="{{ $referenciaBancarium->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $referenciaBancarium->id ?? '' }}
                            </td>
                            <td>
                                {{ $referenciaBancarium->banco_codigo ?? '' }}
                            </td>
                            <td>
                                {{ $referenciaBancarium->agencia_codigo ?? '' }}
                            </td>
                            <td>
                                {{ $referenciaBancarium->conta ?? '' }}
                            </td>
                            <td>
                                {{ $referenciaBancarium->tempo_de_conta ?? '' }}
                            </td>
                            <td>
                                {{ $referenciaBancarium->cartao_de_credito ?? '' }}
                            </td>
                            <td>
                                @can('referencia_bancarium_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.referencia-bancaria.show', $referenciaBancarium->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('referencia_bancarium_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.referencia-bancaria.edit', $referenciaBancarium->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('referencia_bancarium_delete')
                                    <form action="{{ route('admin.referencia-bancaria.destroy', $referenciaBancarium->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('referencia_bancarium_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.referencia-bancaria.massDestroy') }}",
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
  let table = $('.datatable-ReferenciaBancarium:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection