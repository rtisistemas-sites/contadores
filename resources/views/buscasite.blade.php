@extends('index')

@section('website')

<?php
      function limitarTexto($texto, $limite){
          $contador = strlen($texto);
          if ( $contador >= $limite ) {      
              $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
              return $texto;
          }
          else{
            return $texto;
          }
    } 
?>
    <div id="wrapper">
        @include('#menu')
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
                <h1>BUSCA</h1>
                <h3>Aqui sempre tem oque procura</h3>
            </div>   
        </div>

        <div class="white-wrapper">
            <div id="Practice_Area">
                <div id="team">
                    <div class="container">
                        <div class="">
                            <h3>Resultado da busca por <u><b>{{strtoupper($txtbusca->txtbusca)}}</b></u> </h3>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <form id="buscasiteform" action="/buscasite" method="GET" role="form" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-group">
                                      <input type="text" class="form-control" placeholder="Deseja fazer uma nova busca ?" name="txtbusca">
                                      <div class="input-group-btn">
                                        <button class="btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                      </div>
                                    </div>                                    
                                </form>
                            </div>
                         </div>  
                         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> <hr> </div>                        
                    </div><!-- end team_wrapper -->
                </div>
            </div>    
        </div>
        
        @if (count($areasatuacao) != 0)
            @if(!empty($areasatuacao[0]->nome))
            <div class="white-wrapper">
                <div id="Practice_Area">
                    <div class="container" style="padding-top: 1px;">
                            <div class="titulodosblocos" >ÁREAS DE ATUAÇÃO</div>  
                            <br>
                            @if(!empty($areasatuacao[0]->nome))
                            <div class="col-md-3" style="">
                                <div class="panel_icones panel_areasatuacao" style="height: 150px;">
                                    <a href="areas_atuacao/{{$areasatuacao[0]->id}}">
                                        <div style="height: 80px; background: url({{{$areasatuacao[0]->icone}}}) no-repeat center;"></div>
                                    </a>    
                                        <!--<div class="row"></div>-->
                                        <h3 class="titulo_areasatuacao" style="text-align: center;">{{{$areasatuacao[0]->nome}}}</h3>
                                        <p style="text-align: center;"><?php echo limitarTexto($areasatuacao[0]->descricao,190) ?></p>
                                </div>
                            </div>
                            @endif
                            @if(!empty($areasatuacao[1]->nome))
                            <div class="col-md-3" style="">
                                <div class="panel_icones panel_areasatuacao" style="height: 150px;">
                                    <a href="areas_atuacao/{{$areasatuacao[1]->id}}">
                                        <div style="height: 80px; background: url({{{$areasatuacao[1]->icone}}}) no-repeat center;"></div>
                                    </a>    
                                        <h3 class="titulo_areasatuacao" style="text-align: center;">{{{$areasatuacao[1]->nome}}}</h3>
                                        <span class="center-line"></span>
                                        <p><?php echo limitarTexto($areasatuacao[1]->descricao,190) ?></p>
                                </div> 
                            </div>
                            @endif
                            @if(!empty($areasatuacao[2]->nome))
                            <div class="col-md-3" style="">
                                 <div class="panel_icones panel_areasatuacao" style="height: 150px;">
                                     <a href="areas_atuacao/{{$areasatuacao[2]->id}}">
                                        <div style="height: 80px; background: url({{{$areasatuacao[2]->icone}}}) no-repeat center;"></div>
                                     </a>  
                                        <h3 class="titulo_areasatuacao" style="text-align: center;">{{{$areasatuacao[2]->nome}}}</h3>
                                        <p><?php echo limitarTexto($areasatuacao[2]->descricao,190) ?></p>
                                </div>
                            </div>
                            @endif
                            @if(!empty($areasatuacao[3]->nome))
                            <div class="col-md-3" >
                                 <div class="panel_icones panel_areasatuacao" style="height: 150px;">
                                     <a href="areas_atuacao/{{$areasatuacao[3]->id}}">
                                        <div style="height: 80px; background: url({{{$areasatuacao[3]->icone}}}) no-repeat center;"></div>
                                     </a>   
                                        <h3 class="titulo_areasatuacao" style="text-align: center;">{{{$areasatuacao[3]->nome}}}</h3>
                                        <p><?php echo limitarTexto($areasatuacao[3]->descricao,190) ?></p>
                                </div>   
                            </div>
                            @endif
                    </div>
                    <br>
                </div>
            </div>
            @endif        
        @endif
        
        @if (count($servicos) != 0)
            <div class="white-wrapper">
                <div id="Practice_Area">
                    <div id="team">    
                        <div class="container">
                            <div class="titulodosblocos" >SERVIÇOS</div> 
                            <br>
                            <div class="row">
                                @foreach ($servicos as $servico)
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="team_member practice-box">                                       
                                            <div class="col-md-1" style="padding: 0px; margin: 0px; height: 80px; background: url(http://fatogerador.net/painelUnico/public/<?php echo $servico->imagem2 ?>) no-repeat center;"></div>                                           
                                            <div class="div_titulo_paginas  col-md-offset-3 left" style="margin-left: 0px;margin-top: 8px;">
                                                <h3 style="margin-left: 85px;">{{$servico->titulo}}</h3>
                                            </div>                                            
                                            <div class="col-md-11" align="justify" style="text-align: justify;"><?php echo trim($servico->descricao) ?></div>
                                        </div><!-- end col-lg-3 -->
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        @endif

        @if (count($noticias) != 0) 
            <div class="white-wrapper">
                <div id="Practice_Area">
                    <div id="team">
                        <div class="container">
                            <div class="titulodosblocos" >NOTÍCIAS</div>                            
                            <div class="">                    
                                <div class="">
                                    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
                                            @foreach ($noticias as $noticia)
                                                <div >
                                                    <h3><a href="/noticiasapresenta/{{{ $noticia->id }}}"><b>{{{ $noticia->titulo }}}</b></a><span>|</span> <small class="cordata"><i class="fa fa-calendar cordata" aria-hidden="true"></i> {{{ date('d/m/Y',strtotime($noticia->data)) }}} </small></h3>

                                                    <p><?php echo limitarTexto($noticia->noticia, 300) ?> </p>
                                                    <i class="fa fa-tag" aria-hidden="true"></i> {{{ $noticia->categoria }}}<a href="/noticiasapresenta/{{{ $noticia->id }}}" style="color:<?php \Session::get('webcor_leiamais') ?>"><h5><b>LEIA MAIS</b></h5></a></h5>
                                                    <hr>
                                                </div>
                                            @endforeach                             
                                        </div>
                                </div>                    
                            </div><!-- end team_list -->                            
                        </div><!-- end team_wrapper -->
                    </div>
                </div>    
            </div>
        @endif

        @if (count($artigos) != 0)    
            <div class="white-wrapper">
                <div id="Practice_Area">
                    <div id="team">
                        <div class="container">
                            <div class="titulodosblocos" >ARTIGOS</div>
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
                                    </div><!-- end col-lg-3 -->
                                </div>                    
                            </div><!-- end team_list -->                            
                        </div><!-- end team_wrapper -->
                    </div>
                </div>    
            </div>        
        @endif

        @if (count($informativos) != 0)
            <div class="white-wrapper">
                <div id="Practice_Area">
                    <div id="team">
                        <div class="container">
                            <div class="titulodosblocos" >INFORMATIVOS</div>
                            <div class="">                    
                                <div class="">
                                    <br>
                                    @foreach ($informativos as $informativo)    
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                            <div class="team_member practice-box" style="height: 200px;">
                                                <div class="entry">
                                                <p></p>
                                                    <a target="_blank" href="http://fatogerador.net/painelUnico/public/{{{ $informativo->caminho }}}"><img class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{{ $informativo->nomeImagem }}}" alt=""></a>
                                                </div><!-- end entry -->
                                                <h5><a target="_blank" href="http://fatogerador.net/painelUnico/public/{{{ $informativo->caminho }}}"><b>{{{ $informativo->titulo }}}</b></a></h5>
                                            </div><!-- end team_member -->
                                        </div><!-- end col-lg-3 -->
                                    @endforeach
                                </div>                    
                            </div><!-- end team_list -->
                        </div><!-- end team_wrapper -->
                    </div>
                </div>
            </div>        
        @endif        
        
        @if (count($downloads) != 0)
            <div class="white-wrapper">
            <div id="Practice_Area">
            <div id="team">
                <div class="container">
                    <div class="titulodosblocos" >Downloads</div>
                    <div class="">                    
                        <div class="">
                            <br>
                            @foreach ($downloads as $download)    
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" >
                                    <div class="team_member practice-box" style="height: 200px;">
                                        <div class="entry">
                                        <p></p>
                                            <a target="_blank" href="http://fatogerador.net/painelUnico/public/{{{ $download->caminho }}}"><img class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{{ $download->nomeImagem }}}" alt=""></a>
                                        </div><!-- end entry -->
                                        <h5><a target="_blank" href="http://fatogerador.net/painelUnico/public/{{{ $download->caminho }}}"><b>{{{ $download->titulo }}}</b></a></h5>
                                    </div><!-- end team_member -->
                                </div><!-- end col-lg-3 -->
                            @endforeach
                        </div>                    
                    </div><!-- end team_list -->
                </div><!-- end team_wrapper -->
            </div>
            </div>
        </div>        
        @endif
        
        @if (count($link_uteis) != 0)
            <div class="white-wrapper">
            <div id="Practice_Area">
                <div id="team">
                    <div class="container">
                        <div class="titulodosblocos" >LINKS UTÉIS</div>
                        <div class="">                            
                            <div class="">
                                <br>
                                @foreach ($link_uteis as $link)
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="team_member practice-box" style="height: 200px;">
                                            <div class="entry">
                                            <p></p>
                                                <a target="_blank" href="{{{ $link->link }}}"><img class="img-responsive" src="http://fatogerador.net/painelUnico/public/{{{ $link->nomeImagem }}}" alt=""></a>
                                            </div><!-- end entry -->
                                            <h5><a target="_blank" href="{{{ $link->link }}}"><b>{{{ $link->titulo }}}</b></a></h5>                     
                                        </div><!-- end team_member -->
                                    </div><!-- end col-lg-3 -->
                                @endforeach
                            </div>                            
                        </div><!-- end team_list -->
                    </div><!-- end team_wrapper -->
                </div>
            </div>
	</div>       
        @endif        
    </div>

@endsection