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
            <div id="parallax" class="parallax bgback bg" style="background-image: url({{{\Session::get('img_areaatuacao')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
            @if(\Session::get('usarpaineltopo') == 'S') 
                    <div class="div_menu">

                    </div>
               @else
                    <div class="div_menu" style="visibility: hidden;">

                     </div>               
               @endif
            <div class="div_titulo_paginas col-md-6 col-md-offset-3">
             <!--   <h1>NOTÍCIAS</h1>
                <h3>Fique por dentro</h3>-->
            </div>   
        </div>

        <div class="white-wrapper">
            <div id="Practice_Area">
               <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/consulte.css') }}" />-->
                <div id="team">
                        <div class="container">
                         
                               <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                   @include('menu_areas_atuacao')     
                                   <div class="col-sm-8">   
                                       
                                  
                                            
                                        <div class="pull-left" style="height: 30px;width: 38px; margin-top: 6px;">
                                            <img style="margin-top: 3px;height: 24px;width: 28px;" class="img-responsive"  src="{{{$areas_atuacao[0]->icone}}}" alt="" /> 
                                        </div>
                                       
                                        <div>
                                            <h3 style="margin-top: 10px;"> 
                                                <b style="margin-left: 6px;">{{{ ($areas_atuacao[0]->nome) }}}</b>
                                            </h3>
                                            <br>
                                            <p><?php echo ($areas_atuacao[0]->texto) ?> </p>
                                            <hr>
                                        </div>
                                            
                                   </div> 
                                </div>                         
                        </div><!-- end team_list -->                            
                </div><!-- end team_wrapper -->
            </div>
        </div>    
    </div>

@endsection