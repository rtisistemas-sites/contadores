<?php
$espacamento = '';
$padding_right = '';
$menu_m3_volta = '';
if (\Session::get('modelo_bannertopo') === 2) {
    $espacamento = 'margin-top: 0px;padding-top: 0px; ';
}

if (\Session::get('modelo_bannertopo') === 3) {
    $padding_right = 'padding-right: 15% ;';
    if (\Session::get('pagina') == 'HOME') {
        $menu_m3_volta = 'menu-m3-volta';
    }
}
?>


<div id="Home" class="header" style="<?php echo $espacamento ?>">
    @if(\Session::get('modelo_bannertopo') == 3)
    <div class="centraliza_tudo_na_div logo-m3" style="margin-top: 30px ;">
        <a id="" style="text-align: center;" href="/principal"><img class="center-block img-responsive" src="{{\Session::get('imagem_logo')}}" alt="{{\Session::get('cli_nome')}}"></a>
    </div>
    @endif

    <div class="menu-wrapper menu-m3 {{$menu_m3_volta}}">
        <nav id="navigation" class="navbar navbar-default" role="navigation">
            <div class="navbar-inner" >
                <div class="navbar-header col-md-12 ">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-bars fa-2x"></i>
                    </button>
                    @if(((\Session::get('modelo_bannertopo') != 2)) && ((\Session::get('modelo_bannertopo') != 3)))
                    <a id="brand" class="navbar-brand" href="/principal"><img  class="img-responsive"  src="{{\Session::get('imagem_logo')}}" alt="{{\Session::get('cli_nome')}}"></a>
                    @endif
                    @if(\Session::get('modelo_bannertopo') == 2)
                    <a id="brand" class="navbar-brand" href="/principal"><img  class="img-responsive"  src="{{\Session::get('imagem_logo')}}" alt="{{\Session::get('cli_nome')}}"></a>
                    @endif
                </div>

                <div class="navbar-collapse collapse" style="{{$padding_right}}">

                    @if ((!empty(\Session::get('btarearestrita_link'))) and (\Session::get('modelo_bannertopo') != 3))
                    @if ((\Session::get('id_clienteConectado') != 28) && (\Session::get('id_clienteConectado') != 29))
                    <div class="container  pull-right" style="margin-bottom: 0px;">
                        <ul class="nav navbar-nav navbar-right" id="nav">
                            <a class="btn btn-default btn_arearestrita" href="{{\Session::get('btarearestrita_link')}}" target="_blank" style="padding-bottom: 12px;padding-top: 3px;">
                                <i class="fa fa-lock" style="color: {{\Session::get('btarearestrita_fonte')}};" aria-hidden="true"></i> ÁREA RESTRITA<br></a>
                        </ul>
                    </div>
                    @else

                    <div class="container navbar-brand econlex2 pull-right navbar-right" style="margin-bottom: 0px;">
                        <ul class="nav navbar-nav navbar-right " id="nav" style="height: 25px !important;">
                            <div class="col-md-12 form-group">
                                <select name="area" id="inputDestaque" class="form-control font_select" onchange="AbrirSecao(this.value)" style="height:29px !important;"  required="required">
                                    <option value="" selected>Área Restrita</option>
                                    @if(\Session::get('id_clienteConectado') == 28)
                                    <option value="https://www.econlex.com.br/painel/principal.php">Admin</option>
                                    <option value="https://www.econlex.com.br/matriz/principal.php">Matriz</option>
                                    <option value="https://www.econlex.com.br/filial/principal.php">Filial</option>
                                    @else
                                    <option value="https://escritoriocontimar.app.questorpublico.com.br/entrar">Contabilidade</option>
                                    <option value="https://meurh.com.br/contimar/">RH Online</option>
                                    @endif
                                </select>
                            </div>
                        </ul>
                    </div>


                    <script>
                        function AbrirSecao(secao) {
                            window.open("" + secao + "", "_parent");
                        }
                    </script>
                    @endif
                    @endif

                    @if(\Session::get('pagina') == 'HOME')
                    <br>
                    @endif
                    <ul class="nav navbar-nav navbar-right custom"  style="display: table-row;" id="nav">
                        @if (!empty(\Session::get('menu_inicio')))
                        <li <?= \Session::get('pagina') == 'HOME' ? 'class="current"' : '' ?>><a href="/principal" title="">{{{\Session::get('menu_inicio')}}}</a></li>
                        @endif
                        @if (!empty(\Session::get('menu_quemsomos')))
                        <li <?= \Session::get('pagina') == 'QUEMSOMOS' ? 'class="current"' : '' ?>><a href="/quemsomos" title="">{{{\Session::get('menu_quemsomos')}}}</a></li>
                        @endif
                        @if (!empty(\Session::get('menu_areaatuacao')))
                        <li <?= \Session::get('pagina') == 'AREAS_ATUACAO' ? 'class="current"' : '' ?>><a href="/areas_atuacao/{{{0}}}" title="">{{{\Session::get('menu_areaatuacao')}}}</a></li>
                        @endif
                        @if (!empty(\Session::get('menu_servicos')))
                        <li <?= \Session::get('pagina') == 'SERVICOS' ? 'class="current"' : '' ?>><a href="/servicos" title="">{{{\Session::get('menu_servicos')}}}</a></li>
                        @endif
                        @if (!empty(\Session::get('menu_noticias')))
                        <li <?= \Session::get('pagina') == 'NOTICIAS' ? 'class="current"' : '' ?>><a href="/noticias/0" title="">{{{\Session::get('menu_noticias')}}}</a></li>
                        @endif


                        @if ((!empty(\Session::get('menu_downloads'))) AND (\Session::get('id_clienteConectado') == 29))
                        <li <?= \Session::get('pagina') == 'INFORMATIVOS' ? 'class="current"' : '' ?> style="padding-left: 2px !important;padding-right: 2px !important;"><a href="/informativos" style="padding-left: 2px !important;padding-right: 2px !important;" title="">Informativos</a></li>
                        @endif


                        @if (!empty(\Session::get('menu_downloads')))
                        <li <?= \Session::get('pagina') == 'DOWNLOADS' ? 'class="current"' : '' ?>><a href="/downloads" title="">{{{\Session::get('menu_downloads')}}}</a></li>
                        @endif
                        @if (!empty(\Session::get('menu_linksuteis')))
                        <li <?= \Session::get('pagina') == 'LINK_UTEIS' ? 'class="current"' : '' ?>><a href="/link_uteis" title="">{{{\Session::get('menu_linksuteis')}}}</a></li>
                        @endif
                        @if (!empty(\Session::get('menu_consulte')))
                        <li <?= \Session::get('pagina') == 'CONSULTE' ? 'class="current"' : '' ?>><a href="/consulte/conteudo/consulte" title="">{{{\Session::get('menu_consulte')}}}</a></li>
                        @endif

                        <li <?= \Session::get('pagina') == 'CONTATO' ? 'class="current"' : '' ?>><a href="/contato" title="">{{{ \Session::get('menu_contato')}}}</a></li>
                    </ul>


                </div>
            </div>
        </nav>
    </div><!--  menu wrapper   -->



    @if(\Session::get('modelo_bannertopo') == 2)
    <br>
    @endif
    @if(\Session::get('modelo_bannertopo') == 3)
    <br><br>
    @endif
</div><!-- end header -->





