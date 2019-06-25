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
    @if((\Session::get('modelo_bannertopo') == 3) and (strlen(\Session::get('img_linksuteis')) > 43))
    <!--<section class="content" style="height: 300px; margin-top: 30px  ; background-image: url({{{\Session::get('img_linksuteis')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"> </section>-->
    <section class="" style="margin-top: 30px; width: 100%;" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <img class="d-block w-100 img-responsive"  src="{{\Session::get('img_linksuteis')}}" alt="">
    </section>
    <br>
    @endif

    @if(\Session::get('modelo_bannertopo') != 3)
    <div id="page_header">
        <div id="parallax" class="parallax bgback bg" style="background-image: url({{{\Session::get('img_linksuteis')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
        @if(\Session::get('usarpaineltopo') == 'S')
        <div class="div_menu">

        </div>
        @else
        <div class="div_menu" style="visibility: hidden;">

        </div>
        @endif
        <div class="div_titulo_paginas col-md-6 col-md-offset-3">
            @if( \Session::get('id_clienteConectado') != 32 )
            <h1>LINKS UTÉIS</h1>
            <h3>Acesso rápido</h3>
            @else
            <h1>PARCEIROS</h1>
            @endif
        </div>
    </div>
    @endif

    <div class="white-wrapper">
        <div id="Practice_Area {{$fundo_branco_m3}}">
            <div id="team">
                <div class="container">
                    <div class="">
                        @if(\Session::get('modelo_bannertopo') == 3)
                        <h3 class="col-md-12 {{ \Session::get('modelo_bannertopo') == 3 ? 'h3_modelo_03' : '' }}">LINKS ÚTEIS</h3><hr class="col-md-12 {{ \Session::get('modelo_bannertopo') == 3 ? 'hr_modelo_03' : '' }}">
                        @endif
                        <br>
                        <div class="col-md-12">

                            @foreach ($link_uteis as $link)
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                @if(\Session::get('modelo_bannertopo') == 3)
                                <div class="team_member practice-box_" style="height: 200px;padding-bottom: 20px;">
                                    <div class="entry circle2 center-block">
                                        <p></p>
                                        <a target="_blank" href="{{{ $link->link }}}"><img style="padding-top: 40px !important;" class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{{ $link->nomeImagem }}}" alt=""></a>
                                    </div>
                                    <h5><a target="_blank" href="{{{ $link->link }}}"><b>{{{ $link->titulo }}}</b></a></h5>
                                </div>
                                @endif


                                @if(\Session::get('modelo_bannertopo') != 3)
                                <div class="team_member practice-box" style="height: 200px;">
                                    <div class="entry">
                                        <p></p>
                                        <a target="_blank" href="{{{ $link->link }}}"><img class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{{ $link->nomeImagem }}}" alt=""></a>
                                    </div><!-- end entry -->
                                    <h5><a target="_blank" href="{{{ $link->link }}}"><b>{{{ $link->titulo }}}</b></a></h5>
                                </div><!-- end team_member -->
                                @endif
                            </div><!-- end col-lg-3 -->
                            @endforeach
                        </div>
                    </div><!-- end team_list -->
                </div><!-- end team_wrapper -->
            </div>
        </div>
    </div>
    <br>
</div>
@endsection