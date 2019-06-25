@extends('index')

@section('website')

    <div id="wrapper">
      
        @include('#menu')
        <div id="page_header">
            <div id="parallax" class="parallax bgback bg" style="background-image: url({{{\Session::get('img_downloads')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
            @if(\Session::get('usarpaineltopo') == 'S') 
                    <div class="div_menu">

                    </div>
               @else
                    <div class="div_menu" style="visibility: hidden;">

                     </div>               
               @endif
            <div class="div_titulo_paginas col-md-6 col-md-offset-3">
                <h1>INFORMATIVOS</h1>
                <h3>Arquivos de uso do dia à dia da sua empresa</h3>
            </div>   
        </div>

        <div class="white-wrapper">
            <div id="Practice_Area">
            <div id="team">
                <div class="container">
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
    </div>

@endsection