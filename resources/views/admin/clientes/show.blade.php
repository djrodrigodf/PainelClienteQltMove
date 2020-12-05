@extends('layouts.admin')
@section('content')

    <div class="card-header">
        <div class="row d-flex">
            <div class="col-md-6">
                <h1>{{ $cliente->nome_completo }} -  {{ $cliente->cpf }}</h1>
            </div>
            <div class="col-md-6 d-flex align-content-center justify-content-end">
                <a href="{{route('admin.clientes.aprovar', $cliente->id)}}" class="btn btn-primary mr-3 my-auto">Aprovar</a>
                <a href="{{route('admin.clientes.reprovar', $cliente->id)}}" class="btn btn-danger my-auto">Recusar</a>
            </div>
        </div>
    </div>

    <div id="showDetails">
        @include('admin.clientes.show_dados_planos')
        @include('admin.clientes.show_dados_endereco')
        @include('admin.clientes.show_dados_cliente')
        @include('admin.clientes.show_dados_profissionais')
        @include('admin.clientes.show_dados_referencias')
        @include('admin.clientes.show_dados_bancarias')
    </div>
@endsection
