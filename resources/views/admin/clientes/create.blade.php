@extends('layouts.admin')
@section('content')

    <div class="card-header text-center">
        <h1>Ficha do Cliente</h1>
    </div>


    <form method="POST" action="{{ route("admin.clientes.store") }}" enctype="multipart/form-data">
        @csrf

        @include('admin.clientes.create_dados_planos')
        @include('admin.clientes.create_dados_cliente')
        @include('admin.clientes.create_dados_endereco')
        @include('admin.clientes.create_dados_profissionais')
        @include('admin.clientes.create_dados_referencias')
        @include('admin.clientes.create_dados_bancarias')

        <div class="form-group float-right">
            <button class="btn btn-lg btn-success" type="submit">
                Cadastrar
            </button>
        </div>
    </form>




@endsection
