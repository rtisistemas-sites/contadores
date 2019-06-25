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
    @if((\Session::get('modelo_bannertopo') == 3) and (strlen(\Session::get('img_noticias')) > 43))
    <!--<section class="content" style="margin-top: 30px  ; background-image: url({{{\Session::get('img_noticias')}}}); height: 300px; " data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"> </section>-->
    <section class="" style="margin-top: 30px; width: 100%;" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <img class="d-block w-100 img-responsive"  src="{{\Session::get('img_noticias')}}" alt="">
    </section>
    <br>
    @endif

    @if(\Session::get('modelo_bannertopo') != 3)
    <div id="page_header">
        <div id="parallax" class="parallax bgback bg" style="background-image: url({{{\Session::get('img_noticias')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
        @if(\Session::get('usarpaineltopo') == 'S')
        <div class="div_menu">

        </div>
        @else
        <div class="div_menu" style="visibility: hidden;">

        </div>
        @endif
        <div class="div_titulo_paginas col-md-6 col-md-offset-3">
            <h1>NOTÍCIAS</h1>
            <h3>Fique por dentro</h3>
        </div>
    </div>
    @endif

    <div class="white-wrapper">
        <div id="Practice_Area" style="margin-top: 10px;  background: url({{\Session::get('bannermarcadagua')}}) no-repeat left;">
            <div id="team">
                <div class="container">
                    <div class="">
                        <div class="">
                            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                                @if(\Session::get('modelo_bannertopo') == 3)
                                <h3 class="col-md-12 {{ \Session::get('modelo_bannertopo') == 3 ? 'h3_modelo_03' : '' }}">Notícias</h3><hr class="col-md-12 {{ \Session::get('modelo_bannertopo') == 3 ? 'hr_modelo_03' : '' }}">
                                @endif
                                @foreach ($noticias as $noticia)
                                <div class="col-md-12">
                                    <h3><a href="/noticiasapresenta/{{{ $noticia->id }}}"><b>{{{ $noticia->titulo }}}</b></a><span>|</span> <small class="cordata"><i class="fa fa-calendar cordata" aria-hidden="true"></i> {{{ date('d/m/Y',strtotime($noticia->data)) }}} </small></h3>

                                    <p><?php echo limitarTexto($noticia->noticia, 300) ?> </p>
                                    <i class="fa fa-tag" aria-hidden="true"></i> {{{ $noticia->categoria }}}<a href="/noticiasapresenta/{{{ $noticia->id }}}" style="color:<?php \Session::get('webcor_leiamais') ?>"><h5><b>LEIA MAIS</b></h5></a></h5>
                                    @if(\Session::get('modelo_bannertopo') != 3)
                                    <hr>
                                    @endif
                                </div>
                                @endforeach
                                <div class="col-md-12 text-center">
                                    {!! $noticias->render() !!}
                                </div>
                            </div><!-- end col-lg-3 -->

                            <?php
                            $fundo_m3 = '';
                            if (\Session::get('modelo_bannertopo') == 3) {
                                $fundo_m3 = 'background-color: ' . \Session::get('m3_noticia_direitafundo') . '!important; padding: 15px ; ';
                            }
                            ?>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="">
                                    <h3 class="{{ \Session::get('modelo_bannertopo') == 3 ? 'h3_modelo_03' : '' }}">Notícias em Destaque</h3><hr class="{{ \Session::get('modelo_bannertopo') == 3 ? 'hr_modelo_03' : '' }}">
                                    @foreach ($noticiasdestaque as $noticiadestaque)
                                    <div class="entry" style="{{$fundo_m3}}">
                                        @if(\Session::get('modelo_bannertopo') != 3)
                                        <img class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{{ $noticiadestaque->nomeImagem }}}" alt="">
                                        <em class="lead"><a href="/noticiasapresenta/{{{ $noticiadestaque->id }}}">{{{ $noticiadestaque->titulo }}}</a></em><br>
                                        <i class="fa fa-calendar cordata" aria-hidden="true"></i><small class="cordata cordata"> {{{ date('d/m/Y',strtotime($noticiadestaque->data)) }}}</small>
                                        <br>
                                        <i class="fa fa-tag pull-right" aria-hidden="true"></i> {{{ $noticiadestaque->categoria }}}
                                        @else
                                        <img class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{{ $noticiadestaque->nomeImagem }}}" alt="">
                                        <b class="lead_Modelo_03"><a href="/noticiasapresenta/{{{ $noticiadestaque->id }}}">{{{ $noticiadestaque->titulo }}}</a></b><br>
                                        <i class="fa fa-calendar cordata pull-left" aria-hidden="true" style="padding-top: 10px; padding-bottom: 10px;">
                                            <small style="font-family: 'Oxygen', sans-serif;"> {{ date('d/m/Y',strtotime($noticiadestaque->data)) }}</small></i>
                                        <i class="fa fa-tag cordata pull-right" aria-hidden="true" style="padding-top: 10px; padding-bottom: 10px;">
                                            <small style="font-family: 'Oxygen', sans-serif;"> {{ $noticiadestaque->categoria }}</small></i>
                                        <br>
                                        @endif
                                    </div><!-- end entry -->
                                    <br>
                                    @endforeach
                                </div>
                                <br>
                                <div class="">
                                    <h3 class="{{ \Session::get('modelo_bannertopo') == 3 ? 'h3_modelo_03' : '' }}">Últimas Notícias</h3><hr class="{{ \Session::get('modelo_bannertopo') == 3 ? 'hr_modelo_03' : '' }}">
                                    @foreach ($noticiasultimas as $noticiaultimas)
                                    @if(\Session::get('modelo_bannertopo') != 3)
                                    <div class="entry">
                                        <em class="lead"><a href="/noticiasapresenta/{{{ $noticiaultimas->id }}}">{{{ $noticiaultimas->titulo }}}</a></em><br>
                                        <i class="fa fa-calendar cordata" aria-hidden="true"></i><small class="cordata"> {{{ date('d/m/Y',strtotime($noticiaultimas->data)) }}}</small> <br>
                                        <i class="fa fa-tag" aria-hidden="true"></i> {{{ $noticiaultimas->categoria }}}
                                    </div>
                                    @else
                                    <div class="entry" style="background-color: {{\Session::get('m3_noticia_direitafundo')}} ; padding: 5px ;">
                                        <b class="lead_Modelo_03"><a href="/noticiasapresenta/{{{ $noticiaultimas->id }}}">{{{ $noticiaultimas->titulo }}}</a></b><br>
                                        <i class="fa fa-calendar cordata pull-left" aria-hidden="true" style="padding-top: 10px; padding-bottom: 10px;">
                                            <small style="font-family: 'Oxygen', sans-serif;"> {{{ date('d/m/Y',strtotime($noticiaultimas->data)) }}}</small></i>
                                        <i class="fa fa-tag cordata pull-right" aria-hidden="true" style="padding-top: 10px; padding-bottom: 10px;">
                                            <small style="font-family: 'Oxygen', sans-serif;">{{{ $noticiaultimas->categoria }}}</small></i>
                                        <br>
                                    </div>
                                    @endif
                                    <br>
                                    @endforeach
                                </div>
                                <br>
                                <div>
                                    <h3 class="{{ \Session::get('modelo_bannertopo') == 3 ? 'h3_modelo_03' : '' }}">Categorias</h3><hr class="{{ \Session::get('modelo_bannertopo') == 3 ? 'hr_modelo_03' : '' }}">
                                    @foreach ($categorias as $categoria)
                                    <div class="entry cor_categoriaselecionada">                                          <!-- style="color: {{{\Session::get('cor_fontenoticiascategorias')}}};"-->
                                        <i class="fa fa-tag" aria-hidden="true"></i><a href="/noticias/{{{ $categoria->id }}}"> {{{ $categoria->nome }}}</a>
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