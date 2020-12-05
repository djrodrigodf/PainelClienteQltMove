@extends('layouts.admin')
@section('content')

    <div class="card-header">
        <div class="row d-flex">
            <div class="col-md-6">
                <h1>Ajustar Plano</h1>
            </div>
        </div>
    </div>

    <div id="showDetails">
        @include('admin.propostas.create_dados_planos')
    </div>
@endsection
