<div class="row">
    <br>
    <br>
</div>

<section class="container col-md-12" style="background: #E5E5E5; margin: 0; margin-left: 15px">    		
    <div class="popular-img" style="margin-top: 25px;">
        <a href="#"> <img src="{{ asset('consulte_img/icon6.png') }}" class="img-responsive" alt=""></a>      
    </div>
    <div class="col-md-3" style="margin-top: 8px;">
        <h3 class="Cabin Cinza-Chumbo tituloContato">
            <small>AGENDA DE</small>
            <br>
            <b>OBRIGAÇÕES</b>	
        </h3>
    </div>
    
    <div style="margin-top: 25px;">
    <form name="form1" action="/consulte/conteudo/consult" method="GET" role="form" enctype="multipart/form-data">
        <div>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">     
        </div>    
        
                  
            <div class=" col-md-3">
            <label for="mes" class="control-label ">Mês</label>            
            <select name="mes" class="form-control" id="mes">
                <option selected="selected">Escolha um Mês...</option>
                <option {{date('m') == 1 ? 'selected="selected"' : '' }} value="Janeiro">Janeiro</option>
                <option {{date('m') == 2 ? 'selected="selected"' : '' }} value="Fevereiro">Fevereiro</option>
                <option {{date('m') == 3 ? 'selected="selected"' : '' }} value="Março">Março</option>
                <option {{date('m') == 4 ? 'selected="selected"' : '' }} value="Abril">Abril</option>
                <option {{date('m') == 5 ? 'selected="selected"' : '' }} value="Maio">Maio</option>
                <option {{date('m') == 6 ? 'selected="selected"' : '' }} value="Junho">Junho</option>
                <option {{date('m') == 7 ? 'selected="selected"' : '' }} value="Julho">Julho</option>
                <option {{date('m') == 8 ? 'selected="selected"' : '' }} value="Agosto">Agosto</option>
                <option {{date('m') == 9 ? 'selected="selected"' : '' }} value="Setembro">Setembro</option>
                <option {{date('m') == 10 ? 'selected="selected"' : '' }} value="Outubro">Outubro</option>
                <option {{date('m') == 11 ? 'selected="selected"' : '' }} value="Novembro">Novembro</option>
                <option {{date('m') == 12 ? 'selected="selected"' : '' }} value="Dezembro">Dezembro</option>
            </select>
            <br/><br/>
        </div>
        
        <div class="col-md-3 ">
            <label for="ano" class="control-label ">Ano</label>
            <select name="ano" class="form-control" id="ano">
                <option {{date('Y') == 2015 ? 'selected="selected"' : '' }} value="2015">2015</option>
                <option {{date('Y') == 2016 ? 'selected="selected"' : '' }} value="2016">2016</option>
                <option {{date('Y') == 2017 ? 'selected="selected"' : '' }} value="2017">2017</option>
                <option {{date('Y') == 2018 ? 'selected="selected"' : '' }} value="2018">2018</option>
                <option {{date('Y') == 2019 ? 'selected="selected"' : '' }} value="2019">2019</option>
                <option {{date('Y') == 2020 ? 'selected="selected"' : '' }} value="2020">2020</option>
                <option {{date('Y') == 2021 ? 'selected="selected"' : '' }} value="2021">2021</option>
                <option {{date('Y') == 2022 ? 'selected="selected"' : '' }} value="2022">2022</option>
                <option {{date('Y') == 2023 ? 'selected="selected"' : '' }} value="2023">2023</option>
                <option {{date('Y') == 2024 ? 'selected="selected"' : '' }} value="2024">2024</option>
                <option {{date('Y') == 2025 ? 'selected="selected"' : '' }} value="2025">2025</option>
                <option {{date('Y') == 2026 ? 'selected="selected"' : '' }} value="2026">2026</option>
                <option {{date('Y') == 2027 ? 'selected="selected"' : '' }} value="2027">2027</option>
                <option {{date('Y') == 2028 ? 'selected="selected"' : '' }} value="2028">2028</option>
                <option {{date('Y') == 2029 ? 'selected="selected"' : '' }} value="2029">2029</option>
                <option {{date('Y') == 2030 ? 'selected="selected"' : '' }} value="2030">2030</option>
            </select><br/>                 
        </div><br/>
        
        <div class="col-sm-2 ">
            <button type="submit" class="btn btn-primary pull-center" style="width: 100%">Consultar</button>
        </div>
    </form>
    </div>
</section>


<?php $qtd = 0; ?>
@foreach ($dados_principais_obrigacoes as $row_principais_obrigacoes)
<?php $qtd = $qtd + 1; 
      $contador = 1;
      $a = $qtd-1;
      $a2 = 2;
      ?>
@endforeach
<div class="row"></div>
<div class="container">
    <hr class="topoTitulo2" style="background: #4B0082">
        <h3 class="Cabin Cinza-Chumbo tituloContato"><i class="fa fa-calendar"></i><b> {{{$dados_principais_obrigacoes[0]->mes}}} {{{$dados_principais_obrigacoes[0]->ano}}}</b>
        </h3>
</div><!--
<div class="container col-md-12" style="padding: 0; margin: 0;">
    <div class="container col-md-">
        <hr class="topoTitulo">
        <h3 class="Cabin Cinza-Chumbo tituloContato"><i class="fa fa-calendar"></i><b> {{{$dados_principais_obrigacoes[0]->mes}}} {{{$dados_principais_obrigacoes[0]->ano}}}</b>
        </h3>
    </div><!--
    <div class="indicators icon-circulop">                    
        <ol>
           <?php $active = 0 ?>  
            @foreach ($dados_principais_obrigacoes as $row_principais_obrigacoes)
            <li style="" id="li_{{{ $active }}}" data-target="#myCarousel" data-slide-to="{{{ $active }}}" class=" {{{ $active == 0 ? 'active' : '' }}}"><i><?php if ($row_principais_obrigacoes->dia_mes < 10) echo '0'.$row_principais_obrigacoes->dia_mes; else echo $row_principais_obrigacoes->dia_mes ?></i></li>
            <?php $active = $active + 1; ?>
            @endforeach
        </ol>
    </div> 
</div> --> 

<section class="">
<div id="myCarousel" class="carousel slide" data-ride="carousel">            
            <!-- Indicators --><!--
                @if (count($dados_principais_obrigacoes) > 1)
                        <ol class="carousel-indicators">
                            <?php $contador = 0; ?>
                            @foreach ($dados_principais_obrigacoes as $row_principais_obrigacoes)	
                                    @if ($contador == 0)	
                                            <li data-target="#myCarousel" data-slide-to="{{{ $contador }}}" class="active"></li>
                                    @else
                                            <li data-target="#myCarousel" data-slide-to="{{{ ($contador) }}}">{{{ ($contador) }}}</li>
                                    @endif
                                    <?php $contador = $contador + 1;
                                    ?>
                                @endforeach 	
                        </ol>
                @endif
            -->

            <!-- Wrapper for slides -->
            <div id="myCarousel" class="carousel-inner" role="listbox">
                <?php
                $active = 'active';
                $Cont = 0;
                $aux = 1;
                $a = 0;
                $a2 = 0;
                $cor_fundo = "cor_fundo2";
                ?>
                @foreach ($dados_principais_obrigacoes as $row_principais_obrigacoes)                    
                <div class="item {{{ $active }}}">                        
                    <?php  
                        if($active == 'active')  
                              $cor_primeira = 'background: #26cda4';
                        else
                              $cor_primeira = '';                      
                              
                        if (!floor($Cont / 4)) {
                               if (($aux == 5)||($aux == 4))
                                    $aux = 1; 
                               
                                if(($qtd-$a) == 4)
                                   $aux = 1; 
                                if(($qtd-$a) == 3)
                                   $aux = 2;
                                if(($qtd-$a) == 2)
                                   $aux = 3;
                               
                            $pegar = true;                               
                            for ($i=$Cont;$aux<5;$i++){
                                if($pegar)
                                  $i = $a;
                                $pegar = false;
                                if (($i==$qtd)){
                                  $i = 0;                                  
                                }
                                if($row_principais_obrigacoes->dia_mes == $dados_principais_obrigacoes[$i]->dia_mes)  
                                   $cor_fundo = "cor_fundo";
                                else
                                   $cor_fundo = "cor_fundo2";
   
                                ?>
                                
                        <div ><!--class="col-sm-12"-->
                            <div class="col-sm-3">
                                <div class="process-step"> <span class="process-border"></span>
                                    <div class="icon-circulo {{{$cor_fundo}}}"  style="padding-left: 85px;"><i><?php if ($dados_principais_obrigacoes[$i]->dia_mes < 10) echo '0'.$dados_principais_obrigacoes[$i]->dia_mes; else echo $dados_principais_obrigacoes[$i]->dia_mes ?></i> </div>
                                    <div style="height: 260px; border: 3px solid #ddd; padding:10px; margin: 0;">
                                        <p><?php echo trim($dados_principais_obrigacoes[$i]->descricao) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            $Cont = $Cont + 1;
                            $aux  = $aux + 1;
                            $a2 = $a2 + 1;
                            if (($Cont==$qtd)){
                              $Cont = 1;
                              $aux  = 5;
                            }                            
                            }
                            } else {
                            $a2 = 0;    
                            if (($aux == 5)||($aux == 4))
                              $aux = 1;      
                           for ($b=$Cont;$aux<5;$b++){
                               if ($a2 == 0)
                                 $Cont = $a;
                               if($row_principais_obrigacoes->dia_mes == $dados_principais_obrigacoes[$Cont]->dia_mes)  
                                   $cor_fundo = "cor_fundo";
                                else
                                   $cor_fundo = "cor_fundo2";
                            ?>  
                        <div class="col-sm-3">
                            <div class="process-step"> <span class="process-border"></span>
                                <div class="icon-circulo {{{$cor_fundo}}}"  style="padding-left: 85px;"><i><?php if ($dados_principais_obrigacoes[$Cont]->dia_mes < 10) echo '0'.$dados_principais_obrigacoes[$Cont]->dia_mes; else echo $dados_principais_obrigacoes[$Cont]->dia_mes ?></i> </div>
                                <div style="height: 260px; border: 3px solid #ddd; padding:10px; margin: 0;">
                                    <p><?php echo trim($dados_principais_obrigacoes[$Cont]->descricao) ?></p>
                                </div>
                            </div>
                        </div>
                      <?php
                      $Cont = $Cont + 1;
                      $aux  = $aux + 1; 
                      $a2 = $a2 + 1;
                        if (($Cont==$qtd)){
                              $Cont = 0;
                              $aux  = 5;
                        }
                      if (($a2 == 5)||($a2 == 4))
                          $a2 = 0;
                    }
                    } ?>
                </div>
                <?php $active = ''; 
                      $a= $a + 1;
                      if ($a == $qtd)
                          $a = 0;
                      ?>
                @endforeach
            </div>  
            
            
            
                    
                    
                   <!-- <ol>
                    <?php $active = 0 ?>  
                        @foreach ($dados_principais_obrigacoes as $row_principais_obrigacoes)
                        <li class="" style="" id="li_{{{ $active }}}" data-target="#myCarousel" data-slide-to="{{{ $active }}}" class="{{{ $active == 0 ? 'active' : '' }}}"><i>{{{$row_principais_obrigacoes->dia_mes}}}</i></li>
                    <?php $active = $active + 1; ?>
                        @endforeach
                    </ol>-->
                   <!-- <script>
                        $('#myCarousel').on('slid.bs.carousel', function () {
                            var currentIndex = $('div.active').index();
                            $('li.active').removeClass("active"); //aqui removemos a class do item anteriormente clicado para que possamos adicionar ao item clicado
                            $('#li_' + currentIndex).addClass("active"); //aqui adicionamos a class ao item clicado
                        });
                    </script>  -->
        </div>
            <div class="col-md-12 indicators">
                   <!-- 
                    <ol>
                    <?php $active = 0 ?>  
                        @foreach ($dados_principais_obrigacoes as $row_principais_obrigacoes)
                        <li style="background: #ddd" id="li_{{{ $active }}}" data-target="#myCarousel" data-slide-to="{{{ $active }}}" class="{{{ $active == 0 ? 'active' : '' }}}"></li>
                    <?php $active = $active + 1; ?>
                        @endforeach
                    </ol>-->
                    <script>
                        $('#myCarousel').on('slid.bs.carousel', function () {
                            var currentIndex = $('div.active').index();
                            $('li.active').removeClass("active"); //aqui removemos a class do item anteriormente clicado para que possamos adicionar ao item clicado
                            $('#li_' + currentIndex).addClass("active"); //aqui adicionamos a class ao item clicado
                        });
                    </script>  
            </div>
</section>





<div class="row">
    <br>
    <hr class="topoTitulo2">
    <h3 class="Cabin Cinza-Chumbo tituloContato">
        @if ($pagina != 'consult_data_obrigacoes') 	
        <small>TABELAS</small>
        <br>
        <b>PRÁTICAS</b>
        @else
        <small>AGENDA DE</small>
        <br>
        <b>OBRIGAÇÕES</b>						
        @endif	
    </h3>
</div>			
<div class="col-sm-4 Cabin Extra-Bold"><!--sidebar-box--><!--sidebar-box--><!--sidebar-box-->
    <div class="sidebar-box margin40">

        <ul class="list-unstyled popular-post">
            @if ($pagina != 'consult_data_obrigacoes')
            <li>
                <div class="popular-img">
                    <a href="/consulte/conteudo/consult"> <img src="{{ asset('consulte_img/icon1.png') }}" class="img-responsive" alt=""></a>
                </div>
                <div class="popular-desc">
                    <h5 class="h5"> <a class="OpenSans Extra-Bold Cinza-Chumbo" href="/consulte/conteudo/consult">FATOR DE REAJUSTE DO ALUGUEL ANUAL</a></h5>
                    <h6 class="OpenSans Regular Cinza-Contato"><br></h6>
                </div>
            </li>
            <li>
                <div class="popular-img">
                    <a href="/consulte/conteudo/consult_indicador_preco"> <img src="{{ asset('consulte_img/icon2.png') }}" class="img-responsive" alt=""></a>
                </div>
                <div class="popular-desc">
                    <h5 class="h5"> <a class="OpenSans Extra-Bold Cinza-Chumbo" href="/consulte/conteudo/consult_indicador_preco">PRINCIPAIS INDICADORES DE PREÇOS</a></h5>
                    <h6 class="OpenSans Regular Cinza-Contato"><br></h6>
                </div>
            </li>
            <li>
                <div class="popular-img">
                    <a href="/consulte/conteudo/consult_ir"> <img src="{{ asset('consulte_img/icon3.png') }}" class="img-responsive" alt=""></a>
                </div>
                <div class="popular-desc">
                    <h5 class="h5"> <a class="OpenSans Extra-Bold Cinza-Chumbo" href="/consulte/conteudo/consult_ir">IR - FONTE E CARNÊ LEÃO</a></h5>
                    <h6 class="OpenSans Regular Cinza-Contato"><br></h6>
                </div>
            </li>
            <li>
                <div class="popular-img">
                    <a href="/consulte/conteudo/consult_simples_nacional"> <img src="{{ asset('consulte_img/icon4.png') }}" class="img-responsive" alt=""></a>
                </div>
                <div class="popular-desc">
                    <h5 class="h5"> <a class="OpenSans Extra-Bold Cinza-Chumbo" href="/consulte/conteudo/consult_simples_nacional">SIMPLES NACIONAL PERCENTUAIS APLICADOS</a></h5>
                    <h6 class="OpenSans Regular Cinza-Contato"><br></h6>
                </div>
            </li>
            <li>
                <div class="popular-img">
                    <a href="/consulte/conteudo/consult_contas_praticas"> <img src="{{ asset('consulte_img/icon5.png') }}" class="img-responsive" alt=""></a>
                </div>
                <div class="popular-desc">
                    <h5 class="h5"> <a class="OpenSans Extra-Bold Cinza-Chumbo" href="/consulte/conteudo/consult_contas_praticas">CONTAS PRÁTICAS <br> INSS - CONTRIBUIÇÕES PREVIDENCIÁRIAS</a></h5>
                    <h6 class="OpenSans Regular Cinza-Contato">Segurado empregado, empregado doméstico <br>e trabalhador avulso<br></h6>
                </div>
            </li>
            <li>
                <div class="popular-img">
                    <a href="/consulte/conteudo/consult_contas_praticas_empregador"> <img src="{{ asset('consulte_img/icon5.png') }}" class="img-responsive" alt=""></a>
                </div>
                <div class="popular-desc">
                    <h5 class="h5"> <a class="OpenSans Extra-Bold Cinza-Chumbo" href="/consulte/conteudo/consult_contas_praticas_empregador">CONTAS PRÁTICAS <br> INSS - CONTRIBUIÇÕES PREVIDENCIÁRIAS</a></h5>
                    <h6 class="OpenSans Regular Cinza-Contato">Segurado empregado doméstico <br>(Tabela para orientação<br> do empregador doméstico)<br></h6>
                </div>
            </li>
            @else
            <li>
                <div class="popular-img">
                    <a href="#"> <img src="{{ asset('consulte_img/icon6.png') }}" class="img-responsive" alt=""></a>
                </div>
                <div class="popular-desc">
                    <form name="form1" action="/consulte/conteudo/consult_data_obrigacoes" method="GET" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                        <h5 class="h5"> <a class="OpenSans Extra-Bold Cinza-Chumbo" href="#">CONSULTE AS OBRIGAÇÕES DO MÊS</a></h5>
                        <h6 class="OpenSans Regular Cinza-Contato">Escolha um mês e ano...</h6>
                        <div class="form-group">
                            <label for="mes" class="control-label col-md-2">Mês</label>
                            <div class="col-md-10">
                                <select name="mes" class="form-control" id="mes">
                                    <option selected="selected">Escolha um Mês...</option>
                                    <option {{date('m') == 1 ? 'selected="selected"' : '' }} value="Janeiro">Janeiro</option>
                                    <option {{date('m') == 2 ? 'selected="selected"' : '' }} value="Fevereiro">Fevereiro</option>
                                    <option {{date('m') == 3 ? 'selected="selected"' : '' }} value="Março">Março</option>
                                    <option {{date('m') == 4 ? 'selected="selected"' : '' }} value="Abril">Abril</option>
                                    <option {{date('m') == 5 ? 'selected="selected"' : '' }} value="Maio">Maio</option>
                                    <option {{date('m') == 6 ? 'selected="selected"' : '' }} value="Junho">Junho</option>
                                    <option {{date('m') == 7 ? 'selected="selected"' : '' }} value="Julho">Julho</option>
                                    <option {{date('m') == 8 ? 'selected="selected"' : '' }} value="Agosto">Agosto</option>
                                    <option {{date('m') == 9 ? 'selected="selected"' : '' }} value="Setembro">Setembro</option>
                                    <option {{date('m') == 10 ? 'selected="selected"' : '' }} value="Outubro">Outubro</option>
                                    <option {{date('m') == 11 ? 'selected="selected"' : '' }} value="Novembro">Novembro</option>
                                    <option {{date('m') == 12 ? 'selected="selected"' : '' }} value="Dezembro">Dezembro</option>
                                </select>
                            </div><br /><br />
                        </div>
                        <div class="form-group">
                            <label for="ano" class="control-label col-md-2">Ano</label>
                            <div class="col-md-10">
                                <select name="ano" class="form-control" id="ano">
                                    <option {{date('Y') == 2015 ? 'selected="selected"' : '' }} value="2015">2015</option>
                                    <option {{date('Y') == 2016 ? 'selected="selected"' : '' }} value="2016">2016</option>
                                    <option {{date('Y') == 2017 ? 'selected="selected"' : '' }} value="2017">2017</option>
                                    <option {{date('Y') == 2018 ? 'selected="selected"' : '' }} value="2018">2018</option>
                                    <option {{date('Y') == 2019 ? 'selected="selected"' : '' }} value="2019">2019</option>
                                    <option {{date('Y') == 2020 ? 'selected="selected"' : '' }} value="2020">2020</option>
                                    <option {{date('Y') == 2021 ? 'selected="selected"' : '' }} value="2021">2021</option>
                                    <option {{date('Y') == 2022 ? 'selected="selected"' : '' }} value="2022">2022</option>
                                    <option {{date('Y') == 2023 ? 'selected="selected"' : '' }} value="2023">2023</option>
                                    <option {{date('Y') == 2024 ? 'selected="selected"' : '' }} value="2024">2024</option>
                                    <option {{date('Y') == 2025 ? 'selected="selected"' : '' }} value="2025">2025</option>
                                    <option {{date('Y') == 2026 ? 'selected="selected"' : '' }} value="2026">2026</option>
                                    <option {{date('Y') == 2027 ? 'selected="selected"' : '' }} value="2027">2027</option>
                                    <option {{date('Y') == 2028 ? 'selected="selected"' : '' }} value="2028">2028</option>
                                    <option {{date('Y') == 2029 ? 'selected="selected"' : '' }} value="2029">2029</option>
                                    <option {{date('Y') == 2030 ? 'selected="selected"' : '' }} value="2030">2030</option>
                                </select><br />
                            </div>	
                        </div>
                        <button type="submit" class="btn btn-primary pull-center" style="width: 100%">Consultar</button>
                    </form>
                </div>
            </li>
            @endif
        </ul>
    </div><!--sidebar-box-->
</div>