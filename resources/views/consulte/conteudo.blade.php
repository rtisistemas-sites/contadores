@extends('index')

@section('website')
<?php
$fundo_branco_m3 = '';

if (\Session::get('modelo_bannertopo') == 3) {
    $fundo_branco_m3 = 'fundo-branco-m3';
}
?>
<div id="wrapper" style="height: 360px;">

    @include('#menu')
    @if((\Session::get('modelo_bannertopo') == 3) and (strlen(\Session::get('img_consulte')) > 43))
    <!--<section class="content" style="height: 300px; margin-top: 30px  ; background-image: url({{\Session::get('img_consulte')}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></section>-->
    <section class="" style="margin-top: 30px; width: 100%;" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <img class="d-block w-100 img-responsive"  src="{{\Session::get('img_consulte')}}" alt="">
    </section>
    <br>
    @endif


    <div id="page_header">
        @if(\Session::get('modelo_bannertopo') != 3)
        <div id="parallax" class="parallax bgback bg" style="background-image: url({{{\Session::get('img_consulte')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>


        @if(\Session::get('usarpaineltopo') == 'S')
        <div class="div_menu">

        </div>
        @else
        <div class="div_menu" style="visibility: hidden;">

        </div>
        @endif
        @endif
        <div class="div_titulo_paginas col-md-6 col-md-offset-3">
            <h1></h1>
            <h3></h3>
        </div>
    </div>

    <div class="white-wrapper">
        <div id="Practice_Area {{$fundo_branco_m3}}"></div>
    </div>

</div>

<link rel="stylesheet" type="text/css" href="{{ asset('css/consulte.css') }}" />

<div id="tables" class="container" style="margin-top: -60px !important;">
    @include('consulte/menu_lateral')

    @if(($pagina == 'consult') || ($pagina == 'consulte'))
    @include('consulte/consult')
    @endif

    @if($pagina == 'consult_contas_praticas')
    @include('consulte/consult_contas_praticas')
    @endif

    @if($pagina == 'consult_contas_praticas_empregador')
    @include('consulte/consult_contas_praticas_empregador')
    @endif

    @if($pagina == 'consult_indicador_preco')
    @include('consulte/consult_indicador_preco')
    @endif

    @if($pagina == 'consult_ir')
    @include('consulte/consult_ir')
    @endif

    @if($pagina == 'consult_simples_nacional')
    @include('consulte/consult_simples_nacional')
    @endif

    @if($pagina == 'consult_data_obrigacoes')
    @include('consulte/consult_data_obrigacoes')
    @endif

    @if($pagina == 'escolha')
    h1 class="text-center">Escolha uma das opções ao lado</h1>
@endif
</div>

<script>
    window.location.href = '#fato';
</script>
<br>
@endsection