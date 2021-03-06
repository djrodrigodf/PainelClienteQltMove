@extends('layouts.admin')
@section('content')
@can('plano_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.planos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.plano.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Plano', 'route' => 'admin.planos.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.plano.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Plano">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.id') }}
                        </th>
                        <th>
                            Foto
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.marca') }}
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.ano') }}
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.veiculo') }}
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.km') }}
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.periodo') }}
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.r_zero') }}
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.r_um') }}
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.r_dois') }}
                        </th>
                        <th>
                            {{ trans('cruds.plano.fields.r_tres') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($planos as $key => $plano)
                        <tr data-entry-id="{{ $plano->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $plano->id ?? '' }}
                            </td>
                            <td>
                                @if ($plano->foto)
                                    <img src="{{url('storage\\' . $plano->foto)}}" width="100px" alt="">
                                @endif

                            </td>
                            <td>
                                {{ $plano->marca ?? '' }}
                            </td>
                            <td>
                                {{ $plano->ano ?? '' }}
                            </td>
                            <td>
                                {{ $plano->veiculo ?? '' }}
                            </td>
                            <td>
                                {{ $plano->km ?? '' }}
                            </td>
                            <td>
                                {{ $plano->periodo ?? '' }}
                            </td>
                            <td>
                                {{ $plano->r_zero ?? '' }}
                            </td>
                            <td>
                                {{ $plano->r_um ?? '' }}
                            </td>
                            <td>
                                {{ $plano->r_dois ?? '' }}
                            </td>
                            <td>
                                {{ $plano->r_tres ?? '' }}
                            </td>
                            <td>
                                @can('plano_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.planos.show', $plano->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('plano_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.planos.edit', $plano->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('plano_delete')
                                    <form action="{{ route('admin.planos.destroy', $plano->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('plano_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.planos.massDestroy') }}",
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
  let table = $('.datatable-Plano:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
