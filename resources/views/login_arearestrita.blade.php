@extends('index')

@section('website')

    <div id="wrapper">

        @include('#menu')
            <div id="page_header">
                        <div id="parallax" class="parallax bgback bg" style="background-image: url({{{\Session::get('img_quemsomos')}}});" data-stellar-background-ratio="0.6" data-stellar-vertical-offset="20"></div>
                        @if(\Session::get('usarpaineltopo') == 'S') 
                                <div class="div_menu">

                                </div>
                           @else
                                <div class="div_menu" style="visibility: hidden;">

                                 </div>               
                           @endif
                        <div class="div_titulo_paginas col-md-6 col-md-offset-3">
                            <h1>ÁREA RESTRITA</h1>
                            <h3>Conheça a {{{\Session::get('cli_nome')}}}</h3>
                        </div>   
                    </div>
        
                    <!-- texto -->
                    <div class="white-wrapper">
                    <div id="Practice_Area">
                        <div class="container">
                                <div class=" col-md-4"></div>
                                <div class=" col-md-4 center-block">
                                            <form id="contactform" action="/acessar_ar" method="POST" role="form" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">

                                                    <div class="col-md-12 form-group">
                                                            <label for="">Área</label>
                                                            <select name="area" id="inputDestaque" class="form-control" required="required">
                                                                    <option  value="1" selected>Admin</option>
                                                                    <option  value="2">Matriz</option>
                                                                    <option  value="3">Filial</option>
                                                            </select>
                                                    </div>
                                                    
                                                    <div class="col-md-12 form-group">
                                                        <label class="form-group">Usuário : </label>
                                                        <input type="text" name="user" id="user" required class="form-control">
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12 form-group">
                                                        <label class="form-group">Senha</label>
                                                        <input type="text" name="senha" id="senha" required class="form-control">
                                                    </div>


                                                    <div class="col-md-4">
                                                        <button type="submit" value="SEND" id="submit" class="btn btn-lg btn-primary">Acessar</button>
                                                    </div>
                                            </form>
                                </div>
                                <div class=" col-md-4"></div>
                    </div>
                </div>  
    
    </div>
                    
            

@endsection