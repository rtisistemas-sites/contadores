@extends('index')

@section('website')

<?php

function limitarTexto($texto, $limite) {
    $contador = strlen($texto);
    if ($contador >= $limite) {
        $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
        return $texto;
    } else {
        return $texto;
    }
}
?>

<div class="animationload" style="color: red;">
    <div class="loader" style="color: rgba(126,126,126,1);">Carregando...</div>
</div>

<div class="makeborder-top"></div>
<div class="makeborder-bottom"></div>
<div class="makeborder-left"></div>
<div class="makeborder-right"></div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="searchform" role="form">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <input type="text" class="form-control" placeholder="What you are looking for?">
            </form>
        </div>
    </div>
</div>

<div id="wrapper">
    @include('#menu')

    <?php if ((\Session::get('modelo_bannertopo') == 1) || ($qtdbannertopo == 1)) { ?>
        <div id="page_header">

            <div id="parallax" class="parallax bgback bg" style="background-image: url({{\Session::get('webcor_imagem_principal')}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
            </div>

            <div class="container text-center header-part">
                @if((!(empty(\Session::get('frase_palavrafixa1')))) && (!(empty(\Session::get('frase_palavrafixa2')))) && (!(empty(\Session::get('frase_palavragiratoria1'))))
                && (!(empty(\Session::get('frase_palavragiratoria2')))) && (!(empty(\Session::get('frase_palavragiratoria3')))) && (!(empty(\Session::get('frase_palavragiratoria4')))))
                <h2 class="header-text">{{{\Session::get('frase_palavrafixa1')}}} <span class="rotate">{{{\Session::get('frase_palavragiratoria1')}}}, {{{\Session::get('frase_palavragiratoria3')}}} </span> {{{\Session::get('frase_palavrafixa2')}}} <span class="rotate"> {{{\Session::get('frase_palavragiratoria2')}}}, {{{\Session::get('frase_palavragiratoria4')}}} </span></h2>


                <div class="angle-down">
                    <a href="#Practice_Area">
                        <i class="fa fa-angle-double-down fa-4x wow animated fadeInDown" ></i>
                    </a>
                </div>
                @else
                <h2 class="header-text2"></h2>

                <div class="angle-down">
                    <a href="#Practice_Area" >
                        <i class="fa fa-angle-double-down2 fa-4x wow animated fadeInDown" ></i>
                    </a>
                </div>
                @endif
            </div>


        </div><!-- end page_header -->
        <?php
    } else

    if (\Session::get('modelo_bannertopo') == 2) {
        ?>

        <section class="content" style="height: 73px;"> </section>
        <div id="parallar">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"/>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <?php if ($qtdbannertopo > 0) { ?>

                <?php
                $aux = $bannertopo[0]->id;
                $conta = 1;
                $n_slide = 0;
                ?>
                <div id="MiddleCarousel2" class="carousel slide UACarousel" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <!--<li data-target="#MiddleCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#MiddleCarousel" data-slide-to="1"></li>-->

                    </ol>
                    <div class="carousel-inner">
                        @foreach($bannertopo as $banner2)
                        @if($banner2->id == $aux)
                        <div class="carousel-item active">
                            <a href="{{$banner2->link}}">
                                <img class="d-block w-100" src="https://fatogerador.net/painelUnico/public{{$banner2->imagem}}" alt="">
                            </a>
                        </div>
                        <?php $n_slide = 0; ?>
                        @else
                        <div class="carousel-item">
                            <a href="{{$banner2->link}}">
                                <img class="d-block w-100"  src="https://fatogerador.net/painelUnico/public{{$banner2->imagem}}" alt="">
                            </a>
                        </div>
                        <?php $n_slide = $n_slide + 1; ?>
                        @endif
                        @endforeach
                    </div>
                    <a class="left carousel-control2" data-target="#MiddleCarousel2" data-slide-to="<?php ($n_slide - 1) ?>" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control2" data-target="#MiddleCarousel2" data-slide-to="<?php ($n_slide + 1) ?>" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php } ?>
        </div>

        <?php
    } else

    if (\Session::get('modelo_bannertopo') == 3) {
        ?>

        <section class="content" style="height: 30px;"></section>
        <div id="parallar">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"/>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <?php if ($qtdbannertopo > 0) { ?>

                <?php
                $aux = $bannertopo[0]->id;
                $conta = 1;
                $n_slide = 0;
                ?>
                <div id="MiddleCarousel2" class="carousel slide UACarousel" data-ride="carousel">
                    <ol class="carousel-indicators">

                    </ol>
                    <div class="carousel-inner"  style="background: wheat;height: 100% !important;">
                        @foreach($bannertopo as $banner2)
                        @if($banner2->id == $aux)
                        <div class="carousel-item active">
                            <a href="{{$banner2->link}}">
                                <img class="d-block w-100 img-responsive" style="height: 100%;" src="https://fatogerador.net/painelUnico/public{{$banner2->imagem}}" alt="">
                            </a>
                        </div>
                        <?php $n_slide = 0; ?>
                        @else
                        <div class="carousel-item">
                            <a href="{{$banner2->link}}">
                                <img class="d-block w-100 img-responsive" style="height: 100%;"  src="https://fatogerador.net/painelUnico/public{{$banner2->imagem}}" alt="">
                            </a>
                        </div>
                        <?php $n_slide = $n_slide + 1; ?>
                        @endif
                        @endforeach
                    </div>
                    <a class="left carousel-control2" data-target="#MiddleCarousel2" data-slide-to="<?php ($n_slide - 1) ?>" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control2" data-target="#MiddleCarousel2" data-slide-to="<?php ($n_slide + 1) ?>" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php } ?>
        </div>
        <!-- <div class="modelo_bannertopo_03_quemsomos"><a href="/quemsomos" title="">{{{\Session::get('menu_quemsomos')}}}</a></div>-->
    <?php } ?>

    <?php
    $corSite = '';
    if (\Session::get('modelo_pgprincipal') == 1) {
        ?>
        <div class="white-wrapper">
            <div id="Practice_Area">
                @if(\Session::get('panelicones_paginaprincipal') == 'S')
                <section class="">
                    <div class=" container title text-center " style="margin-bottom:50px !important;">
                        <h3><b>{{{\Session::get('cli_nome')}}}</b></h3>
                        <br>
                        <div class="col-md-12">
                            <p align="justify"><?php echo trim(\Session::get('textoDestaque')) ?></p>
                        </div>
                        <br>
                    </div>
                    <div class="row" style="margin: 0px !important; padding: 0px !important;"></div>


                    <?php if (count($areasatuacao_destaque2) > 3) { ?>


                        @if(!empty($areasatuacao_destaque2[0]->nome))
                        <div class="panel_areasatuacao"><!--id="page_header"-->
                            <br>
                            <br>
                            <div class="container" style="padding-top: 1px;">
                                @if(!empty($areasatuacao_destaque2[0]->nome))
                                <div class="col-md-3" style="">
                                    <div class="panel_icones">
                                        <a href="areas_atuacao/{{$areasatuacao_destaque2[0]->id}}">
                                            <div style="height: 80px; background: url({{{$areasatuacao_destaque2[0]->icone}}}) no-repeat center;"></div>
                                        </a>
                                        <!--<div class="row"></div>-->
                                        <h3 class="titulo_areasatuacao" style="text-align: center;">{{{$areasatuacao_destaque2[0]->nome}}}</h3>
                                        <p style="text-align: center;"><?php echo limitarTexto($areasatuacao_destaque2[0]->descricao, 190) ?></p>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($areasatuacao_destaque2[1]->nome))
                                <div class="col-md-3" style="">
                                    <div class="panel_icones">
                                        <a href="areas_atuacao/{{$areasatuacao_destaque2[1]->id}}">
                                            <div style="height: 80px; background: url({{{$areasatuacao_destaque2[1]->icone}}}) no-repeat center;"></div>
                                        </a>
                                        <h3 class="titulo_areasatuacao" style="text-align: center;">{{{$areasatuacao_destaque2[1]->nome}}}</h3>
                                        <span class="center-line"></span>
                                        <p><?php echo limitarTexto($areasatuacao_destaque2[1]->descricao, 190) ?></p>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($areasatuacao_destaque2[2]->nome))
                                <div class="col-md-3" style="">
                                    <div class="panel_icones">
                                        <a href="areas_atuacao/{{$areasatuacao_destaque2[2]->id}}">
                                            <div style="height: 80px; background: url({{{$areasatuacao_destaque2[2]->icone}}}) no-repeat center;"></div>
                                        </a>
                                        <h3 class="titulo_areasatuacao" style="text-align: center;">{{{$areasatuacao_destaque2[2]->nome}}}</h3>
                                        <p><?php echo limitarTexto($areasatuacao_destaque2[2]->descricao, 190) ?></p>
                                    </div>
                                </div>
                                @endif
                                @if(!empty($areasatuacao_destaque2[3]->nome))
                                <div class="col-md-3" style="">
                                    <div class="panel_icones">
                                        <a href="areas_atuacao/{{$areasatuacao_destaque2[3]->id}}">
                                            <div style="height: 80px; background: url({{$areasatuacao_destaque2[3]->icone}}) no-repeat center;"></div>
                                        </a>
                                        <h3 class="titulo_areasatuacao" style="text-align: center;">{{{$areasatuacao_destaque2[3]->nome}}}</h3>
                                        <p><?php echo limitarTexto($areasatuacao_destaque2[3]->descricao, 190) ?></p>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <br>
                            <br>
                        </div>
                        @endif
                    <?php } ?>
                    <br><br>
                </section>


                @endif
                <div class="container">
                    <div class="title text-center">
                        <h3>Notícias Destaques</h3>
                        <em class="lead2"> Fique bem informado !</em>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="portfolio-items container col-md-12" >
                            @foreach ($noticias as $noticia)
                            <div class="item-blog  col-md-4 ">
                                <ul>
                                    <li class="img_item descicao_ultimas_noticias">
                                        <img class="img-responsive"  src="https://fatogerador.net/painelUnico/public/{{{ $noticia->nomeImagem }}}" alt="" />

                                        <a href="/noticiasapresenta/{{{ $noticia->id }}}"><h1 style="color: {{\Session::get('webcor_titulo_noticias_pagina_principal')}};">{{ $noticia->titulo }}</h1></a>

                                    </li>
                                </ul>
                            </div>
                            @endforeach

                        </div><!-- End of .portfolio-items -->

                    </div><!-- end row -->
                </div>

                <section class="section_ultimas_noticias">
                    <div class="container bloco_ultimas_noticias">
                        <div class="row titulo_fixo_ultimas_noticias">
                            <a href="/noticias/0">Últimas Noticias</a>
                        </div>
                        <div class="row descicao_ultimas_noticias">
                            @foreach ($ultimasnoticias as $ultimasnoticiasLinha)
                            <div class="col-md-4 col-xs-12 itens_ultimas_noticias">
                                <div class="col-md-12 textos_ultimas_noticias">
                                    <a href="/noticiasapresenta/{{{ $ultimasnoticiasLinha->id }}}">
                                        <h1 style="color: {{\Session::get('webcor_titulo_noticias_pagina_principal')}}"> {{{$ultimasnoticiasLinha->titulo}}} </h1>
                                    </a>
                                   <!-- <p><?= substr($ultimasnoticiasLinha->noticia, 0, 166) ?>...</p> -->
                                    <p><?= limitarTexto($ultimasnoticiasLinha->noticia, 166) ?></p>
                                </div>
                                <div class="col-md-6 link_ultimas_noticias">
                                    <a href="/noticiasapresenta/{{ $ultimasnoticiasLinha->id }}">Leia Mais</a>
                                </div>
                                <div class="col-md-6 data_ultimas_noticias">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d/m/Y',strtotime($ultimasnoticiasLinha->data)) }}
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="title text-center">
                            <em class="lead"> <a href="/noticias/0">Veja outras notícias</a></em>
                        </div>
                    </div>
                </section>

            </div><!-- end portfolio_wrapper -->
            <div class="Practice_Area_butom">
            </div>

        </div>


        <?php
    } else
    if (\Session::get('modelo_pgprincipal') == 2) {
        ?>
        <div class="white-wrapper">
            <div id="Practice_Area">



                @if(!empty($areasatuacao_destaque[0]->titulo))

                <section class="row" style="margin: 0px !important;padding: 0px !important;">

                    <div class="title text-center melhor_oferecer container col-md-12">
                        <div class="col-lg-12" style="height: 30px;margin-top: 70px;"></div>
                        <h4>O MELHOR QUE PODEMOS OFERECER</h4>
                        <hr class="linnha1">
                        <hr class="linnha2">
                        <br>
                    </div>


                    <div class=" col-md-4" style="background: {{\Session::get('areaatuacao_fundobloco1')}} !important;">
                        @if(!empty($areasatuacao_destaque[0]->titulo))

                        <div class="blocomelhor_oferecer">
                            <div style="height: 80px; background: url(https://fatogerador.net/painelUnico/public{{{$areasatuacao_destaque[0]->imagem}}}) no-repeat center;"></div>

                            <h3 class="titulo_areasatuacao">{{$areasatuacao_destaque[0]->titulo}}</h3>
                            <center>
                                <p><?php echo limitarTexto($areasatuacao_destaque[0]->resumo, 190) ?></p>
                            </center>
                        </div>
                        <br>

                        @endif
                    </div>
                    <div class=" col-md-4" style="background: {{\Session::get('areaatuacao_fundobloco2')}} !important;">
                        @if(!empty($areasatuacao_destaque[1]->titulo))

                        <div class="blocomelhor_oferecer">
                            <div style="height: 80px; background: url(https://fatogerador.net/painelUnico/public{{{$areasatuacao_destaque[1]->imagem}}}) no-repeat center;"></div>

                            <h3 class="titulo_areasatuacao">{{{$areasatuacao_destaque[1]->titulo}}}</h3>
                            <center>
                                <p><?php echo limitarTexto($areasatuacao_destaque[1]->resumo, 190) ?></p>
                            </center>
                        </div>
                        <br>

                        @endif
                    </div>
                    <div class=" col-md-4 " style="background: {{\Session::get('areaatuacao_fundobloco3')}} !important;">
                        @if(!empty($areasatuacao_destaque[2]->titulo))

                        <div class="blocomelhor_oferecer">
                            <div style="height: 80px; background: url(https://fatogerador.net/painelUnico/public{{{$areasatuacao_destaque[2]->imagem}}}) no-repeat center;"></div>

                            <h3 class="titulo_areasatuacao">{{{$areasatuacao_destaque[2]->titulo}}}</h3>
                            <center>
                                <p><?php echo limitarTexto($areasatuacao_destaque[2]->resumo, 190) ?></p>
                            </center>
                        </div>
                        <br>

                        @endif
                    </div>
                </section>
                @endif

                <div class="container">
                    <div class="title text-center noticia_destaque2">
                        <div class="col-lg-12" style="height: 80px;"></div>
                        <h3>Notícias Destaques</h3>
                        <em> Fique bem informado !</em>
                        <br>
                        <br>
                        <br>
                    </div>


                    <!-- CARROSEL -------------------------- -->
                    <style type="text/css">
                        @import url("css/carousel.news.css");
                    </style>
                    <div class="row">
                        <div class="col-xs-12">
                            <br>

                            <div class="container">
                                <div id="myCarousel"class="carousel slide" data-ride="carousel" >
                                    <center>


                                        <ol class="carousel-indicators indicadores">
                                            <li data-target="#myCarousel" data-slide-to="0" class="active" style="height: 35px;width: 35px;"></li>
                                            <li data-target="#myCarousel" data-slide-to="1" style="height: 35px;width: 35px;"></li>
                                            <li data-target="#myCarousel" data-slide-to="2" style="height: 35px;width: 35px;"></li>
                                        </ol>

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner"  style="background: rgba(215, 215, 215, 0.088235) !important;">
                                            <div  class="item active" style="max-width: 1000px;">
                                                <a href="<?= '/noticiasapresenta/' . $noticias[0]->id ?>">
                                                    <img src="<?php echo 'https://fatogerador.net/painelUnico/public/' . $noticias[0]->nomeImagem; ?>">
                                                </a>
                                                <div class="carousel-caption d-none d-md-block indicadores titulo_slide_noticiasdestaque col-md-12">
                                                    <center>
                                                        <h3 class="col-md-10">{{ $noticias[0]->titulo }}</h3>
                                                    </center>
                                                </div>
                                            </div><!-- End Item -->

                                            <?php
                                            foreach ($noticias as $row) {

                                                if ($row->id == $noticias[0]->id) {
                                                    continue;
                                                } else {
                                                    ?>
                                                    <div class="item"  >
                                                        <a href="<?= '/noticiasapresenta/' . $row->id ?>">
                                                            <img src="<?php echo 'https://fatogerador.net/painelUnico/public/' . $row->nomeImagem; ?>"></a>

                                                        <div class="carousel-caption d-none d-md-block indicadores titulo_slide_noticiasdestaque col-md-12">
                                                            <center>
                                                                <h3 class="col-md-10">{{ $row->titulo }}</h3>
                                                            </center>
                                                        </div>

                                                    </div><!-- End Item -->
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div><!-- End Carousel Inner -->

                                    </center>


                                    <style>
                                        /*muda a descrição focado*/
                                        .list-group > .active {
                                            color: <?php echo \Session::get('noticiasdestaque_fontedescricao_selecionado') ?> !important;
                                        }



                                        .list-group  {
                                            color:<?php echo \Session::get('noticiasdestaque_fontedescricao') ?> !important;
                                        }

                                        /*muda o titulo focado*/
                                        .list-group > .active > .tty > .tty2 > .tty3 {
                                            color: <?php echo \Session::get('noticiasdestaque_fontetitulo_selecionado') ?> !important;
                                        }

                                        /*muda o link focado*/
                                        .list-group > .active > .tty > p > a  {
                                            color: <?php echo \Session::get('noticiasdestaque_fontetitulo_selecionado') ?> !important;
                                        }



                                        .list-group > .active>:hover {
                                            color:<?php echo \Session::get('noticiasdestaque_fontedescricao_selecionado') ?> !important;
                                        }
                                    </style>
                                    <ul class="list-group col-sm-6">
                                        <li data-target="#myCarousel" data-slide-to="0"  class="list-group-item active" >

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <div class="tty">                                    <!--style="color: #<?= $corSite ?>"-->
                                                <h4 class="tty2" ><a class="link-noticia Extra-Bold tty3"  href="<?= '/noticiasapresenta/' . $noticias[0]->id ?>"><?= $noticias[0]->titulo; ?></a></h4>
                                                <p class="tty4 noticiasdestaque_texto">
                                                    <?php
                                                    echo limitarTexto($noticias[0]->noticia, 100);
                                                    ?>
                                                                                                            <!-- style="color: #<?= $corSite ?>" -->
                                                    <a class="link-noticia_leiamais Italico Regular tty5"  href="<?= '/noticiasapresenta/' . $noticias[1]->id ?>" >Leia Mais</a>
                                                </p>
                                            </div>
                                        </li>
                                        <?php
                                        $i = 1;
                                        foreach ($noticias as $row2) {

                                            if ($row2->id == $noticias[0]->id) {
                                                continue;
                                            } else {
                                                ?>
                                                <li data-target="#myCarousel" data-slide-to="<?= $i ?>" class="list-group-item">

                                                    <div class="tty" style="width: 1000;">
                                                        <?php
                                                        $tira_espaco = '';
                                                        if (strlen($row2->titulo) >= 57)
                                                            $tira_espaco = 'margin-bottom: 0px;padding-bottom: 0px;';
                                                        ?>

                                                        <h4 class="tty2" style="<?php echo $tira_espaco ?>"><a class="link-noticia  Extra-Bold tty3" style="color: #<?= $corSite ?>" href="<?= '/noticiasapresenta/' . $row2->id ?>"><?= $row2->titulo ?></a></h4>
                                                        <p class="tty4 noticiasdestaque_texto" >
                                                            <?php
                                                            /**/
                                                            echo limitarTexto($row2->noticia, 100);
                                                            ?>

                                                            <a class="link-noticia_leiamais Italico Regular tty5" style="color: #<?= $corSite ?>" href="<?= '/noticiasapresenta/' . $row2->id ?>" >Leia Mais</a>
                                                        </p>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                            $i++;
                                        }
                                        ?>
                                    </ul>

                                    <!-- Controls
                                    <div class="carousel-controls">
                                            <a class="left carousel-control" href="#myCarousel" data-slide-to="0" data-slide="prev">
                                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                            </a>
                                            <a class="right carousel-control" href="#myCarousel" data-slide-to="1" data-slide="next">
                                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                            </a>
                                    </div>-->



                                </div><!-- End Carousel -->
                            </div>
                        </div>
                    </div>


                    <!-- FIM CARROSEL ---------------------------- -->


                </div>

                <section class="section_ultimas_noticias">
                    <br>
                    <br>
                    <div class="container bloco_ultimas_noticias">
                        <div class="row titulo_fixo_ultimas_noticias">
                            <a href="/noticias/0" style="color: {{\Session::get('ultimasnoticias_titulofixo')}} !important">Últimas Noticias</a>
                        </div>
                        <br>
                        <div class=" descicao_ultimas_noticias">
                            @foreach ($ultimasnoticias as $ultimasnoticiasLinha)
                            <div class="col-md-4 col-xs-12 itens_ultimas_noticias">
                                <div class="col-md-12 textos_ultimas_noticias">
                                    <a href="/noticiasapresenta/{{{ $ultimasnoticiasLinha->id }}}">
                                        <h1 style="color: {{\Session::get('ultimasnoticias_titulos')}}"> {{{$ultimasnoticiasLinha->titulo}}} </h1>
                                    </a>
                                   <!-- <p><?= substr($ultimasnoticiasLinha->noticia, 0, 166) ?>...</p> -->
                                    <p style="color: {{\Session::get('ultimasnoticias_descricao')}} !important;"><?= limitarTexto($ultimasnoticiasLinha->noticia, 166) ?></p>
                                </div>
                                <div class="col-md-6 link_ultimas_noticias2" style="position: relative !important;">
                                    <a href="/noticiasapresenta/{{ $ultimasnoticiasLinha->id }}">Leia Mais</a>
                                </div>
                                <div class="col-md-6 data_ultimas_noticias" style="position: relative !important;">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d/m/Y',strtotime($ultimasnoticiasLinha->data)) }}
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </section>

            </div><!-- end portfolio_wrapper -->
            <div class="Practice_Area_butom">
            </div>


            @if($qtdbannersecundario > 1)
            <section class="content img-responsive">

                <!-- TESTE para OS BANNERS SECUNDÁRIOS ------------- -->
                <link  href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script  type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <!-- END TESTE ------------- -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"/>
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

                <?php if ($qtdbannersecundario >= 0) { ?>

                    <?php
                    $aux = $bannersecundario[0]->id;
                    $conta = 1;
                    ?>
                    <div id="MiddleCarousel" class="carousel slide UACarousel" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <!--<li data-target="#MiddleCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#MiddleCarousel" data-slide-to="1"></li>-->
                            @foreach($bannersecundario as $banner2)
                            @if($banner2->id == $aux)
                            <li data-target="#MiddleCarousel" data-slide-to="0" class="active"></li>
                            @else
                            <li data-target="#MiddleCarousel" data-slide-to="{{$conta}}"></li>
                            <?php $conta = $conta + 1; ?>
                            @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($bannersecundario as $banner2)
                            @if($banner2->id == $aux)
                            <div class="carousel-item active">
                                <a href="{{$banner2->link}}">
                                    <img class="d-block w-100 img-responsive" style="max-height: 400px;" src="https://fatogerador.net/painelUnico/public{{$banner2->imagem}}" alt="">
                                </a>
                            </div>
                            @else
                            <div class="carousel-item">
                                <a href="{{$banner2->link}}">
                                    <img class="d-block w-100 img-responsive" style="max-height: 400px;" src="https://fatogerador.net/painelUnico/public{{$banner2->imagem}}" alt="">
                                </a>
                            </div>
                            @endif
                            @endforeach
                        </div>

                    </div>
                <?php } ?>
            </section>
            @endif


            <section style="height: 60px;"></section>



            <section class="content newslatter_painel">
                <div class="container">
                    <center>
                        <div class="col-md-12">

                            <div class="col-md-12 nl_linha1">Newslleter</div>
                            <div class="col-md-12 nl_linha2">Cadastre seu e-mail de contato e receba nossos informativos!</div>

                            <div class="col-md-2"></div>
                            <div class="col-md-8" style="margin-top: 6px;">
                                <form name="newsletter" action="/website/newsletter" method="POST" role="form" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-md-12 form-newsletter">
                                        <input type="text" name="email" id="nome" required class="form-control">
                                    </div>

                                    <div class="col-md-12 bt_newsletter">
                                        <a type="submit" href='javascript:newsletter.submit()' class="btn btn-default">CADASTRE-SE</a>
                                    </div>

                                    <div class=" col-md-12" style="height: 10px;"></div>
                                </form>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </center>
                </div>
            </section>

        </div>
        <?php
    } else
    if (\Session::get('modelo_pgprincipal') == 3) {
        $height_principal = 'height-principal';
        $md_12 = '';
        ?>

        <section class="{{$height_principal}}" style="margin-top: 10px;background: url(https://fatogerador.net/painelUnico/public{{$bannermarcadagua[0]->imagem}}) no-repeat left;">
            <section>
                <div class="centraliza_tudo_na_div" style="padding-top: 80px;" id="especialidades-m3">
                    <h1 id="titulo-m3" style="padding-bottom: 35px !important;text-align: center;">CONHEÇA NOSSAS ESPECIALIDADES</h1>
                </div>
                <div class="container img-responsive center-block">
                    <div class="col-md-12 center-block" style="padding: 0px;margin: 0px;">
                        <div class="col-md-3 center-block">
                            <div class="circle center-block">
                                <a href="/servicos#{{$areasatuacao_destaque[0]->id}}"><img style="padding-top: 30px !important;" class="img-responsive img-servico-m3" src="http://fatogerador.net/painelUnico/public/{{$areasatuacao_destaque[0]->imagem }}" alt=""></a>
                            </div>
                            <div class="servico_modelo_pgprincipal_03"><?= limitarTexto($areasatuacao_destaque[0]->resumo, 120) ?></div>
                        </div>
                        <div class="col-md-3 center-block">
                            <div class="circle center-block">
                                <a href="/servicos#{{$areasatuacao_destaque[1]->id}}"><img style="padding-top: 30px !important;" class="img-responsive img-servico-m3" src="http://fatogerador.net/painelUnico/public/{{$areasatuacao_destaque[1]->imagem }}" alt=""></a>
                            </div>
                            <div class="servico_modelo_pgprincipal_03"><?= limitarTexto($areasatuacao_destaque[1]->resumo, 120) ?></div>
                        </div>

                        <div class="col-md-3 center-block">
                            <div class="circle center-block">
                                <a href="/servicos#{{$areasatuacao_destaque[2]->id}}"><img style="padding-top: 30px !important;" class="img-responsive img-servico-m3" src="http://fatogerador.net/painelUnico/public/{{$areasatuacao_destaque[2]->imagem }}" alt=""></a>
                            </div>
                            <div class="servico_modelo_pgprincipal_03"><?= limitarTexto($areasatuacao_destaque[2]->resumo, 120) ?></div>
                        </div>
                        <div class="col-md-3 center-block">
                            <div class="circle center-block">
                                <a href="/servicos#{{$areasatuacao_destaque[3]->id}}"><img style="padding-top: 30px !important;" class="img-responsive img-servico-m3" src="http://fatogerador.net/painelUnico/public/{{$areasatuacao_destaque[3]->imagem }}" alt=""></a>
                            </div>
                            <div class="servico_modelo_pgprincipal_03"><?= limitarTexto($areasatuacao_destaque[3]->resumo, 120) ?></div>
                        </div>
                    </div>





                    <div class="content">
                        <div class="col-md-12" style="margin-top: 50px;">


                            <div class="col-md-12" id="fique-atento2">
                                <h1 class="titulo-bloco-noticias-m3">FIQUE ATENTO</h1>
                                <hr class="hr2_modelo_03">
                                <div class="container col-md-12">
                                    <div id="main_area">
                                        <!-- Slider -->
                                        <div class="row">
                                            <div class="col-md-12" id="slider" style="margin: 0px !important; padding: 0px !important;">
                                                <!-- Top part of the slider -->
                                                <div class="container col-md-12" style="margin: 0px !important; padding: 0px !important;">
                                                    <div class="col-md-12 fundo-ultimas-noticias2-m3" id="carousel-bounding-box" style="height: 320px;margin: 0px;padding: 0px; ">
                                                        <div class="carousel slide" id="custom_carousel" data-ride="carousel" data-interval="5000" style="margin: 0px !important; padding: 0px !important;">
                                                            <!-- Carousel items -->
                                                            <div class="carousel-inner" style="height: 320px; margin: 0px !important; padding: 0px !important;">
                                                                <div class="active item altura_img_destaque" data-slide-number="0">
                                                                    <div class="col-md-12"  style="margin: 0px !important; padding: 0px !important;">
                                                                        <img src="https://fatogerador.net/painelUnico/public{{ $noticias[0]->nomeImagem }}" style="max-width: 100%;height: 319px; margin: 0px !important; padding: 0px !important;" id="img-noticias-destaque">
                                                                        <div style="" class="col-md-12 mostra-titulo">{{$noticias[0]->titulo}}</div>
                                                                    </div>

                                                                    <style>
                                                                        .descricao_noticia>p{
                                                                            line-height: 1.4;
                                                                        }
                                                                    </style>


                                                                    <div class="col-md-5" id="slide-content-1">
                                                                        <div class="col-md-12 col-xs-12 bloco_descricao_noticia">
                                                                            <div class="row descricao_noticia">
                                                                                <a class="col-md-12 tira-margin-padding" href="/noticiasapresenta/{{ $noticias[0]->id }}">
                                                                                    <h2 style="padding-top: 5px;"> {{$noticias[0]->titulo}} </h2>
                                                                                </a>
                                                                                <?= limitarTexto($noticias[0]->noticia, 220); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="item altura_img_destaque" data-slide-number="1">
                                                                    <div class="col-md-12"  style="margin: 0px !important; padding: 0px !important;">
                                                                        <img src="https://fatogerador.net/painelUnico/public{{ $noticias[1]->nomeImagem }}" style="max-width: 100%;height: 319px;" id="img-noticias-destaque">
                                                                        <div style="" class="col-md-12 mostra-titulo">{{$noticias[1]->titulo}}</div>
                                                                    </div>
                                                                    <div class="col-md-5" id="slide-content-1">
                                                                        <div class="col-md-12 col-xs-12 bloco_descricao_noticia">
                                                                            <div class="row descricao_noticia">
                                                                                <a class="col-md-12 tira-margin-padding" href="/noticiasapresenta/{{ $noticias[1]->id }}">
                                                                                    <h2 style="padding-top: 5px;"> {{{$noticias[1]->titulo}}} </h2>
                                                                                </a>
                                                                                <?= limitarTexto($noticias[1]->noticia, 220) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="item altura_img_destaque" data-slide-number="2"  style="margin: 0px !important; padding: 0px !important;">
                                                                    <div class="col-md-12"  style="margin: 0px !important; padding: 0px !important;">
                                                                        <img src="https://fatogerador.net/painelUnico/public{{ $noticias[2]->nomeImagem }}" style="max-width: 100%;height: 319px;" id="img-noticias-destaque">
                                                                        <div style="" class="col-md-12 mostra-titulo">{{$noticias[2]->titulo}}</div>
                                                                    </div>
                                                                    <div class="col-md-5" id="slide-content-1">
                                                                        <div class="col-md-12 col-xs-12 bloco_descricao_noticia">
                                                                            <div class="row descricao_noticia">
                                                                                <a class="col-md-12 tira-margin-padding" href="/noticiasapresenta/{{ $noticias[2]->id }}">
                                                                                    <h2 style="padding-top: 5px;"> {{{$noticias[2]->titulo}}} </h2>
                                                                                </a>

                                                                                <?= limitarTexto($noticias[2]->noticia, 220) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div><!-- Carousel nav -->


                                                        </div>
                                                        <div class="col-md-12" style="margin: 0px;padding: 0px; padding-top: 20px !important;"><hr class="hr2_modelo_03"></div>
                                                    </div>


                                                    <div class="col-md-7" id="carousel-text" style=" position: relative;height: 220px;">  </div>

                                                    <div class=" col-md-5" style="height: 100px;margin: 0px !important;padding: 0px !important;margin-top: -98px !important;">

                                                        <div class="row hidden-xs col-md-12 tira" id="slider-thumbs" style="margin-left: 18px;">
                                                            <!-- Bottom switcher of slider -->
                                                            <ul class="hide-bullets tira" style="padding-left: 6px;">
                                                                <li class="col-md-4 " data-target="#custom_carousel" data-slide-to="0" class="active">
                                                                    <a class="" id="carousel-selector-0"><img class="img-responsive" style="width: 80px;height: 60px;" src="https://fatogerador.net/painelUnico/public{{{$noticias[0]->nomeImagem}}}"></a>
                                                                </li>

                                                                <li class="col-md-4 " data-target="#custom_carousel" data-slide-to="1">
                                                                    <a class="" id="carousel-selector-1"><img class="img-responsive"  style="width: 80px;height: 60px;" src="https://fatogerador.net/painelUnico/public{{{$noticias[1]->nomeImagem}}}"></a>
                                                                </li>

                                                                <li class="col-md-4 " data-target="#custom_carousel" data-slide-to="2">
                                                                    <a class="" id="carousel-selector-2"><img class="img-responsive" style="width: 80px;height: 60px;" src="https://fatogerador.net/painelUnico/public{{{$noticias[2]->nomeImagem}}}"></a>
                                                                </li>

                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--/Slider-->

                                    </div>
                                </div>

                            </div>






                            <div class="col-md-8 center-block" id="fique-atento">
                                <h1 class="titulo-bloco-noticias-m3">FIQUE ATENTO</h1>
                                <hr class="hr2_modelo_03">
                                <div class="container col-md-12">
                                    <div id="main_area">
                                        <!-- Slider -->
                                        <div class="row">
                                            <div class="col-md-12" id="slider" style="margin: 0px !important; padding: 0px !important;">
                                                <!-- Top part of the slider -->
                                                <div class="container col-md-12" style="margin: 0px !important; padding: 0px !important;">
                                                    <div class="col-md-12 fundo-ultimas-noticias2-m3" id="carousel-bounding-box" style="height: 320px;margin: 0px;padding: 0px; ">
                                                        <div class="carousel slide" id="custom_carousel" data-ride="carousel" data-interval="5000" style="margin: 0px !important; padding: 0px !important;">
                                                            <!-- Carousel items -->
                                                            <div class="carousel-inner" style="height: 320px; margin: 0px !important; padding: 0px !important;">
                                                                <div class="active item altura_img_destaque" data-slide-number="0">
                                                                    <div class="col-md-7"  style="margin: 0px !important; padding: 0px !important;">
                                                                        <img src="https://fatogerador.net/painelUnico/public{{ $noticias[0]->nomeImagem }}" style="max-width: 100%;height: 319px; margin: 0px !important; padding: 0px !important;" id="img-noticias-destaque">
                                                                        <div style="" class="col-md-12 mostra-titulo">{{$noticias[0]->titulo}}</div>
                                                                    </div>

                                                                    <style>
                                                                        .descricao_noticia>p{
                                                                            line-height: 1.4;
                                                                        }
                                                                    </style>


                                                                    <div class="col-md-5" id="slide-content-1">
                                                                        <div class="col-md-12 col-xs-12 bloco_descricao_noticia">
                                                                            <div class="row descricao_noticia">
                                                                                <a class="col-md-12 tira-margin-padding" href="/noticiasapresenta/{{ $noticias[0]->id }}">
                                                                                    <h2 style="padding-top: 5px;"> {{$noticias[0]->titulo}} </h2>
                                                                                </a>
                                                                                <?= limitarTexto($noticias[0]->noticia, 220); ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="item altura_img_destaque" data-slide-number="1">
                                                                    <div class="col-md-7"  style="margin: 0px !important; padding: 0px !important;">
                                                                        <img src="https://fatogerador.net/painelUnico/public{{ $noticias[1]->nomeImagem }}" style="max-width: 100%;height: 319px;" id="img-noticias-destaque">
                                                                        <div style="" class="col-md-12 mostra-titulo">{{$noticias[1]->titulo}}</div>
                                                                    </div>
                                                                    <div class="col-md-5" id="slide-content-1">
                                                                        <div class="col-md-12 col-xs-12 bloco_descricao_noticia">
                                                                            <div class="row descricao_noticia">
                                                                                <a class="col-md-12 tira-margin-padding" href="/noticiasapresenta/{{ $noticias[1]->id }}">
                                                                                    <h2 style="padding-top: 5px;"> {{{$noticias[1]->titulo}}} </h2>
                                                                                </a>
                                                                                <?= limitarTexto($noticias[1]->noticia, 220) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="item altura_img_destaque" data-slide-number="2"  style="margin: 0px !important; padding: 0px !important;">
                                                                    <div class="col-md-7"  style="margin: 0px !important; padding: 0px !important;">
                                                                        <img src="https://fatogerador.net/painelUnico/public{{ $noticias[2]->nomeImagem }}" style="max-width: 100%;height: 319px;" id="img-noticias-destaque">
                                                                        <div style="" class="col-md-12 mostra-titulo">{{$noticias[2]->titulo}}</div>
                                                                    </div>
                                                                    <div class="col-md-5" id="slide-content-1">
                                                                        <div class="col-md-12 col-xs-12 bloco_descricao_noticia">
                                                                            <div class="row descricao_noticia">
                                                                                <a class="col-md-12 tira-margin-padding" href="/noticiasapresenta/{{ $noticias[2]->id }}">
                                                                                    <h2 style="padding-top: 5px;"> {{{$noticias[2]->titulo}}} </h2>
                                                                                </a>

                                                                                <?= limitarTexto($noticias[2]->noticia, 220) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div><!-- Carousel nav -->


                                                        </div>
                                                        <div class="col-md-12" style="margin: 0px;padding: 0px; padding-top: 20px !important;"><hr class="hr2_modelo_03"></div>
                                                    </div>


                                                    <div class="col-md-7" id="carousel-text" style=" position: relative;height: 220px;">  </div>

                                                    <div class=" col-md-5" style="height: 100px;margin: 0px !important;padding: 0px !important;margin-top: -98px !important;">

                                                        <div class="row hidden-xs col-md-12 tira" id="slider-thumbs" style="margin-left: 18px;">
                                                            <!-- Bottom switcher of slider -->
                                                            <ul class="hide-bullets tira" style="padding-left: 6px;">
                                                                <li class="col-md-4 " data-target="#custom_carousel" data-slide-to="0" class="active">
                                                                    <a class="" id="carousel-selector-0"><img class="img-responsive" style="width: 80px;height: 60px;" src="https://fatogerador.net/painelUnico/public{{{$noticias[0]->nomeImagem}}}"></a>
                                                                </li>

                                                                <li class="col-md-4 " data-target="#custom_carousel" data-slide-to="1">
                                                                    <a class="" id="carousel-selector-1"><img class="img-responsive"  style="width: 80px;height: 60px;" src="https://fatogerador.net/painelUnico/public{{{$noticias[1]->nomeImagem}}}"></a>
                                                                </li>

                                                                <li class="col-md-4 " data-target="#custom_carousel" data-slide-to="2">
                                                                    <a class="" id="carousel-selector-2"><img class="img-responsive" style="width: 80px;height: 60px;" src="https://fatogerador.net/painelUnico/public{{{$noticias[2]->nomeImagem}}}"></a>
                                                                </li>

                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!--/Slider-->

                                    </div>
                                </div>
                            </div>







                            <!--  -->
                            <div class="col-md-4" id="dimensao_geral" id="fique-atento">
                                <h1 class="titulo-bloco-noticias-m3">ÚLTIMAS NOTÍCIAS</h1>
                                <hr class="hr2_modelo_03">
                                @foreach ($ultimasnoticias as  $ultimasnoticiasLinha)
                                <div class="col-md-12  itens_ultimas_noticias fundo-ultimas-noticias-m3 center-block">
                                    <div class="col-md-12 descricao_noticia" style="margin: 0px !important; padding: 0px !important;">
                                        <a href="/noticiasapresenta/{{{ $ultimasnoticiasLinha->id }}}">
                                            <h3 style="color: {{\Session::get('ultimasnoticias_titulos')}}"> {{{$ultimasnoticiasLinha->titulo}}} </h3>
                                        </a>
                                        <i class="fa fa-calendar pull-right esconde_data" aria-hidden="true" style="color: {{\Session::get('m3_noticias_data')}}"> {{ date('d/m/Y',strtotime($ultimasnoticiasLinha->data)) }}</i>
                                    </div>
                                </div>

                                @endforeach
                                <div class="col-md-12" style="margin: 0px;padding: 0px;"><hr class="hr2_modelo_03"></div>
                            </div>

                        </div>
                    </div>

                    <div>
                        </section>

                        <div class="col-md-12 height_sec"></div>
                        <div class="col-md-12 height_sec"></div>


                        @if($qtdbannersecundario > 1)
                        <section class="content img-responsive" style="margin-top: -100px; margin-bottom: -300px;">

                            <!-- TESTE para OS BANNERS SECUNDÁRIOS ------------- -->
                            <link  href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                            <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                            <script  type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                            <!-- END TESTE ------------- -->
                            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"/>
                            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
                            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

                            <?php if ($qtdbannersecundario >= 0) { ?>

                                <?php
                                $aux = $bannersecundario[0]->id;
                                $conta = 1;
                                ?>
                                <div id="MiddleCarousel" class="carousel slide UACarousel" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <!--<li data-target="#MiddleCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#MiddleCarousel" data-slide-to="1"></li>-->
                                        @foreach($bannersecundario as $banner2)
                                        @if($banner2->id == $aux)
                                        <li data-target="#MiddleCarousel" data-slide-to="0" class="active"></li>
                                        @else
                                        <li data-target="#MiddleCarousel" data-slide-to="{{$conta}}"></li>
                                        <?php $conta = $conta + 1; ?>
                                        @endif
                                        @endforeach
                                    </ol>
                                    <div class="carousel-inner">
                                        @foreach($bannersecundario as $banner2)
                                        @if($banner2->id == $aux)
                                        <div class="carousel-item active">
                                            <a href="{{$banner2->link}}">
                                                <img class="d-block w-100 img-responsive" style="max-height: 400px;" src="https://fatogerador.net/painelUnico/public{{$banner2->imagem}}" alt="">
                                            </a>
                                        </div>
                                        @else
                                        <div class="carousel-item">
                                            <a href="{{$banner2->link}}">
                                                <img class="d-block w-100 img-responsive" style="max-height: 400px;" src="https://fatogerador.net/painelUnico/public{{$banner2->imagem}}" alt="">
                                            </a>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>

                                </div>
                            <?php } ?>



                        </section>

                        @endif

                        </section>
                    <?php } ?>

                    <div class="col-md-12 height_sec"></div>

                </div>

            </div>

            @endsection