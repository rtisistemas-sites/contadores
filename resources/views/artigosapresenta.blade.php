@extends('index')

@section('website')


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
                                    @if (!empty($artigos[0]->nomeImagem))
                                       <br>
                                        <img src="http://fatogerador.net/painelUnico/public/{{{ $artigos[0]->nomeImagem }}}" class="img-responsive" alt="Foto do Artigo">
                                    @endif    
                                    <br>
                                    <hr class="topoTitulo">
                                    <h2>{{{ $artigos[0]->titulo }}}</h2>
                                    <div class="info-post">
                                        <h5 style="line-height: 20px">
                                            Autor: <b>{{{ $artigos[0]->autor }}}</b>
                                            <br>
                                            <i class="fa fa-calendar cordata"></i><small class="cordata"> {{{ date('d/m/Y',strtotime($artigos[0]->data)) }}}</small>
                                            <br>
                                            <i class="fa fa-tag"></i> <?= $artigos[0]->categoria ?>
                                        </h5>
                                    </div>
                                    <br>
                                    <p class="Cinza">
                                        <?php echo $artigos[0]->artigos ?>
                                    </p>    
                                </div><!-- end col-lg-3 -->
                                
                                <div class="" >
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
                                    <div class="">
                                    <h3>Categorias</h3><hr>
                                        @foreach ($categorias as $categoria)
                                            <div class="entry">
                                                <i class="fa fa-tag" aria-hidden="true"></i> <a href="/artigos/{{{ $categoria->id }}}">{{{ $categoria->nome }}}</a>
                                            </div><!-- end entry -->
                                        @endforeach 
                                    </div>  
                                    <br>   
                                    <br> 
                                    <br>                        
                                </div><!-- end col-lg-3 -->
                            </div>                       
                            </div>
                            
                        </div><!-- end team_list -->
                    </div><!-- end team_wrapper -->
                </div>
            </div>
        </div>     
    </div>

@endsection