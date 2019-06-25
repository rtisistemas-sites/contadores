@extends('index')

@section('website')
<?php
$fundo_branco_m3 = '';

if (\Session::get('modelo_bannertopo') == 3) {
    $fundo_branco_m3 = 'fundo-branco-m3';
}
?>
<div id="wrapper">
    @include('#menu')
    @if((\Session::get('modelo_bannertopo') == 3) and (strlen(\Session::get('img_quemsomos')) > 43))
    <!-- <section class="content" style="height: 300px; margin-top: 30px  ; background-image: url({{{\Session::get('img_quemsomos')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"> </section> -->
    <section class="" style="margin-top: 30px; width: 100%;" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <img class="d-block w-100 img-responsive"  src="{{\Session::get('img_quemsomos')}}" alt="">
    </section>
    <br>
    @endif

    @if(\Session::get('modelo_bannertopo') != 3)
    <div id="page_header">
        <div id="parallax" class="parallax bgback bg" style="background-image: url({{\Session::get('img_quemsomos')}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
        @if(\Session::get('usarpaineltopo') == 'S')
        <div class="div_menu">

        </div>
        @else
        <div class="div_menu" style="visibility: hidden;">

        </div>
        @endif
        <div class="div_titulo_paginas col-md-6 col-md-offset-3">
            <h1>QUEM SOMOS</h1>
            <h3>Conheça o {{{\Session::get('cli_nome')}}}</h3>
        </div>
    </div>
    @endif

    <!-- texto -->
    <div class="white-wrapper">
        <!-- <div id="Practice_Area {{$fundo_branco_m3}}" style="margin-top: 10px;min-height: 800px;  background: url({{\Session::get('bannermarcadagua')}}) no-repeat left;"> -->
        <div id="Practice_Area" style="margin-top: 10px;  background: url({{\Session::get('bannermarcadagua')}}) no-repeat left;">
            <div id="team">
                <div class="container">


                    @if(count($fotos) > 0)
                    <img class="img-fluid mx-auto col-md-12 d-block img-responsive" id="big" style="width: 100% !important;max-height: 100% !important;" src="" alt="">
                    @endif

                    @if((count($fotos) < 3) && (count($fotos) > 0))
                    <div class="row">
                        <div class="col-md-12 ">
                            @foreach($fotos as $foto)
                            <div class=" col-md-4 clicou" style="padding-bottom: 15px;padding-top: 15px;">
                                <img class="img-fluid card-img-top img-responsive" style="width: 100%;height: 240px;" src="{{$foto->imagem}}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if(count($fotos) > 5)
                    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/superslides/0.6.2/jquery.superslides.min.js"></script>
                    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"/>


                    <div class="col-md-12 ">

                        <?php
                        $qtd_fotos = 0;
                        foreach ($fotos as $contando)
                            $qtd_fotos = $qtd_fotos + 1;
                        ?>
                        <div class="container row" style="padding: 0px;margin: 0px;">
                            <!-- <div id="demo" class="carousel slide" data-ride="carousel"> -->
                            <div id="demo" class="carousel slide UACarousel col-md-12" data-ride="carousel">

                                <!-- The slideshow -->
                                <div class="carousel-inner no-padding my-5 " >
                                    <div class="carousel-item active">
                                        <?php
                                        $controla = 0;
                                        $contt = 0;
                                        $n_slide = 0;
                                        while (($contt < 3)) {
                                            ?>
                                            <div class=" col-md-4 clicou">
                                                <img class="img-fluid card-img-top" style="width: 100%;height: 240px;" src="{{$fotos[$contt]->imagem}}">
                                            </div>
                                            <?php
                                            $contt = ($contt + 1);
                                            $n_slide = 0;
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    while (($qtd_fotos > $contt)) {
                                        if (is_int($contt / 3)) {
                                            $controla = 0;
                                            ?>
                                            <div class="carousel-item">
                                                <?php
                                                $n_slide = $n_slide + 1;
                                            }
                                            $controla = $controla + 1;
                                            ?>
                                            <div class="col-md-4 clicou">
                                                <img class="img-fluid card-img-top" style="width: 100%;height: 240px;" src="{{$fotos[$contt]->imagem}}">
                                            </div>
                                            <?php if (($controla == 3)) { ?>
                                            </div>
                                            <?php
                                        }
                                        $contt = $contt + 1;
                                    } $contt = 0;
                                    ?>
                                </div>


                                <a class="left carousel-control2" data-target="#demo" data-slide-to="<?php ($n_slide - 1) ?>" role="button" data-slide="prev" style="width: 30px;">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control2" data-target="#demo" data-slide-to="<?php ($n_slide + 1) ?>" role="button" data-slide="next" style="width: 30px;">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>


                            </div>
                        </div>
                    </div>
                    @endif

                    <script>
$(function() {
    $('.clicou img').click(function() {
        var url = $(this).attr('src');
        $('#big').attr('src', url);
    });
});
                    </script>








                    <div class="team_list">
                        @if(\Session::get('quemsomos_semtopo') != 'S')
                        <div class="">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 first">
                                <div class="team_member practice-box">
                                    <div class="entry">
                                        <br>
                                        <img class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{ $dados[0]->nomeImagem }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="col-md-12 tira-margin-padding">
                            <div class="<?= (\Session::get('quemsomos_semtopo') === 'S') ? 'col-lg-12' : 'col-lg-9' ?> col-md-9 col-sm-9 col-xs-12">
                                <div class="team_member practice-box">
                                    <br>
                                    <div align="justify" style="font-size: 15px;"><?php echo trim($dados[0]->texto) ?></div>
                                    <div align="justify" style="text-align: justify;font-size: 15px;"><?php echo trim($dados[0]->textoAuxiliar) ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>


    @endsection