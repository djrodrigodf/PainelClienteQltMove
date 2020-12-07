@extends('layouts.admin')
@section('content')

    <form method="POST" id="CadastroDeProposta" action="{{ route("admin.clientes.store") }}" enctype="multipart/form-data">
        @csrf

        @include('admin.clientes.create_dados_planos')
        @include('admin.clientes.create_dados_cliente')
        @include('admin.clientes.create_dados_endereco')
        @include('admin.clientes.create_dados_profissionais')
        @include('admin.clientes.create_dados_referencias')
        @include('admin.clientes.create_dados_bancarias')

        <div class="form-group float-right">
            <button id="EnviarCadastroProposta" class="btn btn-lg btn-success" type="submit">
                Cadastrar
            </button>
        </div>
    </form>

    <div class="error">
        <span></span>
    </div>
@endsection


@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>



        $('#CadastroDeProposta').validate({
            invalidHandler: function(form, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                        ? 'Verifique o seguinte erro:'
                        : 'Verifique os seguintes erros:';
                    var errors = "";
                    if (validator.errorList.length > 0) {
                        for (x=0;x<validator.errorList.length;x++) {
                            errors += "<li style='text-align: left'>" + validator.errorList[x].message + "</li>";
                        }
                    }
                    Swal.fire({
                        title: message,
                        icon: 'warning',
                        html:'<ul>' + errors + '</ul>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: true,
                        confirmButtonText:
                            '<i class="fa fa-thumbs-up"></i> OK'
                    })
                    // alert(message + errors);
                }
                validator.focusInvalid();
            },
            submitHandler: function(form) {
                $('#CadastroDeProposta').submit();
            },
            ignore:'',
            rules: {
                valor_plano: "required",
                nome_completo: "required",
                cpf: "required",
                rg: "required"
            },
            messages: {
                valor_plano: "Selecione um Plano",
                nome_completo: "Nome obrigatório",
                cpf: "CPF obrigatório",
                rg: "RG obrigatório"
            }
        });

    </script>

@endsection
