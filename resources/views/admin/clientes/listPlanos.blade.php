<div class="row" id="card-veiculo"></div>
<div class="row" id="card-planos"></div>





@section('scripts')
    @parent
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <script>
        let url = "{{route('api.filterplano')}}"
        let veiculo = null;
        let kmselect = null;
        $('#plano_nome').on('change', function() {
            veiculo = this.value
            $('#plano').val('')
            $('#valor_plano').val('')
            $('#card-veiculo').html('')
            $('#card-planos').html('')
            axios.post(url, {
                filterPlano: veiculo,
                groupKm: true
            })
                .then(function (response) {
                    $('#card-veiculo').html('')
                    let i;
                    for (i = 0; i < response.data.length; i++) {
                        $('#card-veiculo').append(`
                        <div class="col-sm-6 col-md-4 mb-3" id="PlanoGrid">
                            <a id="SelectKm${response.data[i].id}" data-kmVeiculo="${response.data[i].km}" data-nomeVeiculo="${response.data[i].veiculo}" data-idPlano="${response.data[i].id}" class="btn btn-light w-100">
                                <div class="">
                                    <h1>${response.data[i].km}Km</h1>
                                </div>
                            </a>
                        </div>
                    `)
                        $(`#SelectKm${response.data[i].id}`).click(function(e) {

                            $('#card-veiculo #PlanoGrid').each(function(e) {
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
                                kmSelected: kmselect
                            })
                                .then(function (response) {
                                    $('#card-planos').html('')
                                    let i;
                                    for (i = 0; i < response.data.length; i++) {
                                        $('#card-planos').append(`
                        <div class="col-sm-6 col-md-4 mb-3" id="PlanoGrid">
                            <a id="SelectPlano${response.data[i].id}" data-valorPlano="${response.data[i].r_tres}"  data-idPlano="${response.data[i].id}" class="btn btn-light w-100">
                                <div class="">
                                    <div class="">
                                        <div class="text-value-lg">${response.data[i].veiculo} <br> ${response.data[i].ano}</div>
                                        <div>${response.data[0].marca}</div>
                                        <small class="text-muted">KM: ${response.data[i].km} <br> Período: ${response.data[i].periodo}</small>
                                        <h3 class="dinheiro">R$ ${response.data[i].r_tres}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                    `)
                                        $(`#SelectPlano${response.data[i].id}`).click(function(e) {

                                            $('#card-planos #PlanoGrid').each(function(e) {
                                                $(this).children().removeClass('btn-success').removeClass('text-white').addClass('btn-light')
                                            });

                                            $('#plano').val(e.currentTarget.dataset.idplano)
                                            $('#valor_plano').val(e.currentTarget.dataset.valorplano)
                                            let idPlanoSelect = "#" + e.currentTarget.id;
                                            $(idPlanoSelect).removeClass('btn-light').addClass('btn-success').addClass('text-white')
                                        })
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


        $('#222plano_nome').on('change', function() {

        });

        $('.dinheiro').mask("#.##0,00");

    </script>


@endsection
