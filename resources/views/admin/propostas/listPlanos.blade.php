<div class="row" id="card-veiculo"></div>
<div class="row" id="card-planos"></div>





@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



    <script>


        function mascaraValor(valor) {
            valor = valor.toString().replace(/\D/g, "");
            valor = valor.toString().replace(/(\d)(\d{8})$/, "$1.$2");
            valor = valor.toString().replace(/(\d)(\d{5})$/, "$1.$2");
            valor = valor.toString().replace(/(\d)(\d{2})$/, "$1,$2");
            return valor
        }

        let url = "{{route('api.filterplano')}}"
        let veiculo = null;
        let kmselect = null;
        let valorApv = $('#valor_apv').val();
        $('#plano_nome').on('change', function () {
            veiculo = this.value
            $('#plano').val('')
            $('#valor_plano').val('')
            $('#card-veiculo').html('')
            $('#card-planos').html('')
            axios.post(url, {
                filterPlano: veiculo,
                groupKm: true,
                valor_apv: valorApv
            })
                .then(function (response) {
                    $('#card-veiculo').html('')
                    let i;
                    for (i = 0; i < response.data.length; i++) {
//PRIMEIRO

                        $('.detalhes-plano').html(`
                        <div class="card">
                        <img src="\\img\\naotemfoto.jpg" class="img-fluid foto-carro" alt="">
                            <div class="card-body">
                                <h5 class="card-title">${response.data[i].marca} - ${response.data[i].veiculo} - ${response.data[i].ano}</h5>
                            </div>
                        </div>
                        `);

                        $('#card-veiculo').append(`
                        <div class="col-sm-6 col-md-4 mb-3" id="PlanoGrid">

                            <a id="SelectKm${response.data[i].id}" data-kmVeiculo="${response.data[i].km}" data-nomeVeiculo="${response.data[i].veiculo}" data-idPlano="${response.data[i].id}"  data-Versao="${response.data[i].versao}" class="btn btn-light w-100">
                                <div class="">
                                    <h1>${response.data[i].km}Km</h1>
                                </div>
                            </a>
                        </div>
                    `)

                        if (response.data[i].foto) {
                            $('.foto-carro').attr("src", "<?php echo url('storage') ?>" + '/' + response.data[i].foto.replace('\\','/').replace('\\','/'));
                            console.log("<?php echo url('storage') ?>" + '/' + response.data[i].foto.replace('\\','/').replace('\\','/'))
                        }
                        $(`#SelectKm${response.data[i].id}`).click(function (e) {

                            $('#card-veiculo #PlanoGrid').each(function (e) {
                                $(this).children().removeClass('btn-primary').removeClass('text-white').addClass('btn-light')
                            });

                            veiculo = e.currentTarget.dataset.nomeveiculo;
                            kmselect = e.currentTarget.dataset.kmveiculo;

                            let idd = "#" + e.currentTarget.id;
                            $(idd).removeClass('btn-light').addClass('btn-primary').addClass('text-white')
                            $('#plano').val('')
                            $('#valor_plano').val('')

                            axios.post(url, {
                                filterPlano: veiculo,
                                groupKm: true,
                                kmSelected: kmselect,
                                valor_apv: valorApv
                            })
                                .then(function (response) {
                                    $('#card-planos').html('')
                                    let i;
                                    let menorValor = [];
                                    for (i = 0; i < response.data.length; i++) {
                                        menorValor.push(parseFloat(response.data[i].r_tres))
                                        $('#card-planos').append(`
                                                <div class="col-sm-6 col-md-4 mb-3" id="PlanoGrid">
                                                    <a id="SelectPlano${response.data[i].id}"
                                                        data-valorPlano="${response.data[i].r_tres}"
                                                        data-periodo="${response.data[i].periodo}"
                                                        data-idPlano="${response.data[i].id}"
                                                        data-r1="${response.data[i].r_um}"
                                                        data-r2="${response.data[i].r_dois}"
                                                        data-r3="${response.data[i].r_tres}"
                                                        data-versao="${response.data[i].versao}"
                                                        class="btn btn-light w-100">
                                                        <div class="">
                                                            <div class="">
                                                                <h4 class="text-muted">${response.data[i].periodo} Meses</h4>
                                                                <h3 class="dinheiro">R$ ${mascaraValor(response.data[i].r_tres)}</h3>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            `)
                                        $(`#SelectPlano${response.data[i].id}`).click(function (e) {
                                            let r1 = e.currentTarget.dataset.r1
                                            let r2 = e.currentTarget.dataset.r2
                                            let r3 = e.currentTarget.dataset.r3
                                            $('#card-planos #PlanoGrid').each(function (e) {
                                                $(this).children().removeClass('btn-success').removeClass('text-white').addClass('btn-light')
                                            });

                                            $("body").keydown(function(e){


                                                var keyCode = e.keyCode || e.which;

                                                if (keyCode === 112) {
                                                    e.preventDefault();
                                                    $('.card-valor').html(`<h1 class="card-title">R$ ${mascaraValor(r1)}</h1>`)
                                                    $('#valor_plano').val(r1)
                                                }
                                                if (keyCode === 113) {
                                                    e.preventDefault();
                                                    $('.card-valor').html(`<h1 class="card-title">R$ ${mascaraValor(r2)}</h1>`)
                                                    $('#valor_plano').val(r2)
                                                }
                                                if (keyCode === 114) {
                                                    e.preventDefault();
                                                    $('.card-valor').html(`<h1 class="card-title">R$ ${mascaraValor(r3)}</h1>`)
                                                    $('#valor_plano').val(r3)
                                                }
                                            });

                                            $('#plano').val(e.currentTarget.dataset.idplano)
                                            $('#valor_plano').val(e.currentTarget.dataset.valorplano)
                                            $('#versao').val(e.currentTarget.dataset.versao)
                                            debugger
                                            let valor = parseFloat(e.currentTarget.dataset.valorplano)
                                            $('.card-valor').html(`<h1 class="card-title">R$ ${mascaraValor(valor)}</h1>`)
                                            $('.periodo').html(`${e.currentTarget.dataset.periodo} Meses`)
                                            $('.apartir').html('')
                                            let idPlanoSelect = "#" + e.currentTarget.id;
                                            $(idPlanoSelect).removeClass('btn-light').addClass('btn-success').addClass('text-white')

                                        })
                                    }

                                    $('.detalhes-plano').html(`
                                        <div class="card">
                                        <img src="\\img\\naotemfoto.jpg" class="img-fluid foto-carro" alt="">
                                            <div class="card-body">
                                                <h5 class="card-title">${response.data[0].marca} - ${response.data[0].veiculo} - ${response.data[0].ano}</h5>
                                                <h4 class="card-text periodo"></h4>
                                                <span class="card-text apartir">A partir de:</span>
                                                    <div class="card-valor">
                                                        <h1 class="card-title">R$ ${mascaraValor(Math.min(...menorValor))}</h1>
                                                    </div>
                                            </div>
                                        </div>
                                    `);

                                    if (response.data[0].foto) {
                                        $('.foto-carro').attr("src", "<?php echo url('storage') ?>" + '/' + response.data[0].foto.replace('\\','/').replace('\\','/'));
                                        console.log("<?php echo url('storage') ?>" + '/' + response.data[i].foto.replace('\\','/').replace('\\','/'))
                                    }

                                })
                                .catch(function (error) {
                                    console.log(error);
                                });

                        })
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        });


        $('#222plano_nome').on('change', function () {

        });

        $('.dinheiro').mask("#.##0,00");

    </script>


@endsection
