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
<div id="wrapper">
    @include('#menu')
    <div id="page_header">
        <div id="parallax" class="parallax bgback bg" style="background-image: url({{{\Session::get('img_artigos')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
        @if(\Session::get('usarpaineltopo') == 'S')
        <div class="div_menu">

        </div>
        @else
        <div class="div_menu" style="visibility: hidden;">

        </div>
        @endif
        <div class="div_titulo_paginas col-md-6 col-md-offset-3">
            <h1>ARTIGOS</h1>
            <h3>Fique por dentro</h3>
        </div>
    </div>

    <div class="white-wrapper">
        <div id="Practice_Area">
            <div id="team">
                <div class="container">
                    <div class="">
                        <div class="">
                            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                                @foreach ($artigos as $artigo)
                                <div >
                                    <h3><a href="/artigosapresenta/{{{ $artigo->id }}}"><b>{{{ $artigo->titulo }}}</b></a><span>|</span> <small class="cordata"><i class="fa fa-calendar cordata" aria-hidden="true"></i> {{{ date('d/m/Y',strtotime($artigo->data)) }}} </small></h3>

                                    <p><?php echo limitarTexto($artigo->artigos, 300) ?> </p>
                                    <i class="fa fa-tag" aria-hidden="true"></i> {{{ $artigo->categoria }}}<a href="/artigosapresenta/{{{ $artigo->id }}}" style="color:<?php \Session::get('webcor_leiamais') ?>"><h5><b>LEIA MAIS</b></h5></a></h5>
                                    <hr>
                                </div>
                                @endforeach
                                <div class="col-md-12 text-center">
                                    {!! $artigos->render() !!}
                                </div>
                            </div><!-- end col-lg-3 -->

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="">
                                    <h3>Artigos em Destaque</h3><hr>
                                    @foreach ($artigosdestaque as $artigodestaque)
                                    <div class="entry">
                                        <img class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{{ $artigodestaque->nomeImagem }}}" alt="">
                                        <em class="lead"><a href="/artigosapresenta/{{{ $artigodestaque->id }}}">{{{ $artigodestaque->titulo }}}</a></em><br>
                                        <i class="fa fa-calendar cordata" aria-hidden="true"></i><small class="cordata"> {{{ date('d/m/Y',strtotime($artigodestaque->data)) }}}</small> <br>
                                        <i class="fa fa-tag" aria-hidden="true"></i> {{{ $artigodestaque->categoria }}}
                                    </div><!-- end entry -->
                                    <br>
                                    @endforeach
                                </div>
                                <br>
                                <div class="">
                                    <h3>Últimos Artigos</h3><hr>
                                    @foreach ($artigosultimas as $artigoultimas)
                                    <div class="entry">
                                        <em class="lead"><a href="/artigosapresenta/{{{ $artigoultimas->id }}}">{{{ $artigoultimas->titulo }}}</a></em><br>
                                        <i class="fa fa-calendar cordata" aria-hidden="true"></i><small class="cordata"> {{{ date('d/m/Y',strtotime($artigoultimas->data)) }}}</small> <br>
                                        <i class="fa fa-tag" aria-hidden="true"></i> {{{ $artigoultimas->categoria }}}
                                    </div><!-- end entry -->
                                    <br>
                                    @endforeach
                                </div>
                                <br>
                                <div>
                                    <h3>Categorias</h3><hr>
                                    @foreach ($categorias as $categoria)
                                    <div class="entry cor_categoriaselecionada">                                          <!-- style="color: {{{\Session::get('cor_fonteartigoscategorias')}}};"-->
                                        <i class="fa fa-tag" aria-hidden="true"></i><a href="/artigos/{{{ $categoria->id }}}"> {{{ $categoria->nome }}}</a>
                                    </div><!-- end entry -->
                                    @endforeach
                                </div>
                                <br>
                                <br>
                                <br>
                            </div><!-- end col-lg-3 -->
                        </div>
                    </div><!-- end team_list -->
                </div><!-- end team_wrapper -->
            </div>
        </div>
    </div>
</div>

@endsection