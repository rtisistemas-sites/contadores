@extends('index')

@section('website')
<div id="wrapper">
    @include('#menu')

    @if((\Session::get('modelo_bannertopo') == 3) and (strlen(\Session::get('img_servicos')) > 43))
    <!--<section class="content" style="height: 300px; margin-top: 30px  ; background-image: url({{{\Session::get('img_servicos')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"> </section>-->
    <section class="" style="margin-top: 30px; width: 100%;" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20">
        <img class="d-block w-100 img-responsive"  src="{{\Session::get('img_servicos')}}" alt="">
    </section>
    <br>
    @endif

    @if(\Session::get('modelo_bannertopo') != 3)
    <div id="page_header">
        <div id="parallax" class="parallax bgback bg" style="background-image: url({{\Session::get('img_servicos')}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
        @if(\Session::get('usarpaineltopo') == 'S')
        <div class="div_menu">

        </div>
        @else
        <div class="div_menu" style="visibility: hidden;">

        </div>
        @endif
        <div class="div_titulo_paginas col-md-6 col-md-offset-3">
            <h1>SERVIÇOS</h1>
            <h3>Trabalhos oferecidos</h3>
        </div>
    </div>
    @endif

    <div class="white-wrapper">
        <div id="Practice_Area" style="margin-top: 10px;  background: url({{\Session::get('bannermarcadagua')}}) no-repeat left;">
            <div id="team">
                <div class="container">
                    @if(\Session::get('modelo_bannertopo') == 3)
                    <h3 class="col-md-12 {{ \Session::get('modelo_bannertopo') == 3 ? 'h3_modelo_03' : '' }}">SERVIÇOS</h3><hr class="col-md-12 {{ \Session::get('modelo_bannertopo') == 3 ? 'hr_modelo_03' : '' }}">
                    @endif
                    <div class="row">
                        @foreach ($servicos as $servico)
                        @if(\Session::get('modelo_bannertopo') == 3)
                        <div class="col-md-12 ">
                            <div class="col-md-1 entry" style="height: 80px; background: yellow;background: radial-gradient(circle closest-side,{{\Session::get('m3_servico_circulofundo')}} 0%,{{\Session::get('newsletter_botaofundo')}}  98%,rgba(0,0,0,0) 100%);">
                                <a name="{{$servico->id }}"></a>
                                <a href=""><img style="padding-top: 19px !important;" class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{$servico->imagem2 }}" alt=""></a>
                            </div>
                            <div id="seta-servicos" class="col-md-1 div-seta-m3"></div>

                            <div class="col-md-10 div-servico-m3 center-block">
                                <h3 style="font-weight: bold;">{{  $servico->titulo}}</h3>
                                <div class="col-md-11" align="justify" style="text-align: justify;"><?php echo trim($servico->descricao) ?></div>
                            </div>
                        </div>
                        <div class="col-md-12" style="height: 20px;"></div>
                        @else
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="team_member practice-box">
                                <div class="col-md-1" style="padding: 0px; margin: 0px; height: 80px; background: url(http://fatogerador.net/painelUnico/public/<?php echo $servico->imagem2 ?>) no-repeat center;"></div>
                                <div class="div_titulo_paginas  col-md-offset-3 left" style="margin-left: 0px;margin-top: 8px;">
                                    <h3 style="margin-left: 85px;">{{  $servico->titulo}}</h3>
                                </div>
                                <div class="col-md-11" align="justify" style="text-align: justify;"><?php echo trim($servico->descricao) ?></div>
                            </div><!-- end col-lg-3 -->
                        </div>
                        <br>
                        @endif
                        <br>
                        <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
