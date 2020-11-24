@extends('layouts.admin')
@section('content')

    <div class="card-header text-center">
        <h1>Ficha do Cliente -  {{ $cliente->id }}</h1>
    </div>

    <div id="showDetails">
        @include('admin.clientes.show_dados_planos')
        @include('admin.clientes.show_dados_cliente')
        @include('admin.clientes.show_dados_endereco')
        @include('admin.clientes.show_dados_profissionais')
        @include('admin.clientes.show_dados_referencias')
        @include('admin.clientes.show_dados_bancarias')
    </div>
@endsection
